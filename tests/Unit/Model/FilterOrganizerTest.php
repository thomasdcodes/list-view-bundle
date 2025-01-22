<?php

namespace Tdc\ListViewBundle\Tests\Unit\Model;

use Symfony\Component\HttpFoundation\Request;
use Tdc\ListViewBundle\Model\Filter\SimpleFilter;
use Tdc\ListViewBundle\Model\FilterOrganizer;
use PHPUnit\Framework\TestCase;

class FilterOrganizerTest extends TestCase
{
    public function testCanInit(): void
    {
        $filterOrganizer = new FilterOrganizer();

        $this->assertInstanceOf(FilterOrganizer::class, $filterOrganizer);
    }

    public function testCanAddGetAndRemoveFilters(): void
    {
        $filterOrganizer = new FilterOrganizer();

        $this->assertEmpty($filterOrganizer->getFilters());

        $filterOrganizer->addFilter('test', SimpleFilter::create('value'));

        $this->assertCount(1, $filterOrganizer->getFilters());

        $filterOrganizer->removeFilter('test');

        $this->assertEmpty($filterOrganizer->getFilters());
    }

    public function testCanInitWithFactoryMethod(): void
    {
        $request = new Request([
            'filter' => [
                'test' => 'value'
            ]
        ]);

        $filterOrganizer = FilterOrganizer::createFromRequest($request);

        $this->assertInstanceOf(FilterOrganizer::class, $filterOrganizer);
        $this->assertCount(1, $filterOrganizer->getFilters());
    }

    public function testWorksWithUnsetFilterInRequest(): void
    {
        $request = new Request([
            'noFilterSet' => [
                'test' => 'value'
            ]
        ]);

        $filterOrganizer = FilterOrganizer::createFromRequest($request);

        $this->assertInstanceOf(FilterOrganizer::class, $filterOrganizer);
        $this->assertCount(0, $filterOrganizer->getFilters());
    }

    public function testCanWorkWithMultidimensionalFilters(): void
    {
        $request = new Request([
            'filter' => [
                'value' => [
                    'min' => 20,
                    'max' => 30,
                ]
            ]
        ]);

        $filterOrganizer = FilterOrganizer::createFromRequest($request);

        $this->assertInstanceOf(FilterOrganizer::class, $filterOrganizer);
        $this->assertCount(1, $filterOrganizer->getFilters());
    }

    public function testIgnoreAddingFilterWithUnknownType(): void
    {
        $request = new Request([
            'filter' => [
                'value' => 123,
            ]
        ]);

        $filterOrganizer = FilterOrganizer::createFromRequest($request);

        $this->assertInstanceOf(FilterOrganizer::class, $filterOrganizer);
        $this->assertCount(0, $filterOrganizer->getFilters());
    }
}

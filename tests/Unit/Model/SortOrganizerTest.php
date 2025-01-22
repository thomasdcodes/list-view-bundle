<?php

namespace Tdc\ListViewBundle\Tests\Unit\Model;

use Symfony\Component\HttpFoundation\Request;
use Tdc\ListViewBundle\Model\Sorting\DefaultSortCriteria;
use Tdc\ListViewBundle\Model\Sorting\SortingDirectionEnum;
use Tdc\ListViewBundle\Model\SortOrganizer;
use PHPUnit\Framework\TestCase;

class SortOrganizerTest extends TestCase
{
    public function testCanInit(): void
    {
        $sortOrganizer = new SortOrganizer();

        $this->assertInstanceOf(SortOrganizer::class, $sortOrganizer);
    }

    public function testCanInitWithFactoryMethod(): void
    {
        $request = new Request();
        $sortOrganizer = SortOrganizer::createFromRequest($request);

        $this->assertInstanceOf(SortOrganizer::class, $sortOrganizer);
    }

    public function testCanInitWithFactoryMethodAndWrongDirectionIdentifier(): void
    {
        $request = new Request([
            'sort' => [
                'test' => 'WRONG'
            ]
        ]);

        $sortOrganizer = SortOrganizer::createFromRequest($request);

        $this->assertInstanceOf(SortOrganizer::class, $sortOrganizer);
    }

    public function testCanAddSorting(): void
    {
        $request = new Request([
            'sort' => [
                'test' => 'DESC'
            ]
        ]);
        $sortOrganizer = SortOrganizer::createFromRequest($request);

        $sortOrganizer->addSortingFacet(DefaultSortCriteria::create('test2',SortingDirectionEnum::DESC));

        $this->assertTrue($sortOrganizer->hasCriteria('test'));
        $this->assertTrue($sortOrganizer->hasCriteria('test2'));
        $this->assertSame(2, $sortOrganizer->getNumberOfCriteria());
        $this->assertCount(2, $sortOrganizer->getSortingCriteria());
    }

    public function testCanRemoveSorting(): void
    {
        $request = new Request([
            'sort' => [
                'test' => 'DESC',
                'test2' => 'DESC',
                'test3' => 'DESC',
            ]
        ]);
        $sortOrganizer = SortOrganizer::createFromRequest($request);

        $this->assertTrue($sortOrganizer->hasCriteria('test'));
        $this->assertTrue($sortOrganizer->hasCriteria('test2'));
        $this->assertTrue($sortOrganizer->hasCriteria('test3'));
        $this->assertSame(3, $sortOrganizer->getNumberOfCriteria());
        $this->assertCount(3, $sortOrganizer->getSortingCriteria());

        $sortOrganizer->removeSortingFacet('test2');

        $this->assertTrue($sortOrganizer->hasCriteria('test'));
        $this->assertFalse($sortOrganizer->hasCriteria('test2'));
        $this->assertTrue($sortOrganizer->hasCriteria('test3'));
        $this->assertSame(2, $sortOrganizer->getNumberOfCriteria());
        $this->assertCount(2, $sortOrganizer->getSortingCriteria());
    }

    public function testLastAddedEntryIsFirstEntryInResult(): void
    {
        $request = new Request([
            'sort' => [
                'test' => 'DESC',
                'test2' => 'DESC',
                'test3' => 'DESC',
            ]
        ]);

        $sortOrganizer = SortOrganizer::createFromRequest($request);
        $criteria = $sortOrganizer->getSortingCriteria();
        $this->assertSame('test3', $criteria[0]->getPropertyName());
        $this->assertSame('test2', $criteria[1]->getPropertyName());
        $this->assertSame('test', $criteria[2]->getPropertyName());
    }
}

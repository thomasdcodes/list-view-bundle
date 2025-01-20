<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Tdc\ListViewBundle\Model\SearchTermOrganizer;

class SearchTermOrganizerTest extends TestCase
{
    public function testCanInit(): void
    {
        $searchTermOrganizer = new SearchTermOrganizer();

        $this->assertInstanceOf(SearchTermOrganizer::class, $searchTermOrganizer);
    }

    public function testCanInitWithFactoryMethod(): void
    {
        $request = new Request(['search' => 'test']);
        $searchTermOrganizer = SearchTermOrganizer::createFromRequest($request);

        $this->assertInstanceOf(SearchTermOrganizer::class, $searchTermOrganizer);
        $this->assertSame('test', $searchTermOrganizer->getSearchTerm());
    }

    public function testCanSetAndGetSearchTerm(): void
    {
        $request = new Request(['search' => 'test']);
        $searchTermOrganizer = SearchTermOrganizer::createFromRequest($request);

        $this->assertInstanceOf(SearchTermOrganizer::class, $searchTermOrganizer);
    }

    public function testCanInitWithoutSearchSetAsQueryParam(): void
    {
        $request = new Request();
        $searchTermOrganizer = SearchTermOrganizer::createFromRequest($request);

        $this->assertInstanceOf(SearchTermOrganizer::class, $searchTermOrganizer);
    }
}
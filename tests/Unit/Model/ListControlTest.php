<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use Tdc\ListViewBundle\Model\FilterOrganizer;
use Tdc\ListViewBundle\Model\ListControl;
use Tdc\ListViewBundle\Model\Paginator;
use Tdc\ListViewBundle\Model\SearchTermOrganizer;
use Tdc\ListViewBundle\Model\SortOrganizer;

class ListControlTest extends TestCase
{
    private ?Paginator $paginatorDouble = null;
    private ?SearchTermOrganizer $searchTermOrganizerDouble = null;
    private ?FilterOrganizer $filterOrganizerDouble = null;
    private ?SortOrganizer $sortOrganizerDouble = null;

    private ?ListControl $listControl = null;

    protected function setUp(): void
    {
        $this->paginatorDouble = $this->createStub(Paginator::class);
        $this->searchTermOrganizerDouble = $this->createStub(SearchTermOrganizer::class);
        $this->filterOrganizerDouble = $this->createStub(FilterOrganizer::class);
        $this->sortOrganizerDouble = $this->createStub(SortOrganizer::class);

        $this->listControl = new ListControl(
            $this->paginatorDouble,
            $this->searchTermOrganizerDouble,
            $this->filterOrganizerDouble,
            $this->sortOrganizerDouble
        );
    }

    public function testCanInit(): void
    {
        $this->assertInstanceOf(ListControl::class, $this->listControl);
    }

    public function testCanGetPaginator(): void
    {
        $this->assertSame($this->paginatorDouble, $this->listControl->getPaginator());
    }

    public function testCanGetSearchTermOrganizer(): void
    {
        $this->assertSame($this->searchTermOrganizerDouble, $this->listControl->getSearchTermOrganizer());
    }

    public function testCanGetFilterOrganizer(): void
    {
        $this->assertSame($this->filterOrganizerDouble, $this->listControl->getFilterOrganizer());
    }

    public function testCanGetSortOrganizer(): void
    {
        $this->assertSame($this->sortOrganizerDouble, $this->listControl->getSortOrganizer());
    }
}
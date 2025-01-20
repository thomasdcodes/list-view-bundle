<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use Tdc\ListViewBundle\Model\ListControl;
use Tdc\ListViewBundle\Model\Paginator;
use Tdc\ListViewBundle\Model\SearchTermOrganizer;

class ListControlTest extends TestCase
{
    public function testCanInit():void
    {
        $paginatorDouble = $this->createStub(Paginator::class);
        $searchTermOrganizerDouble = $this->createStub(SearchTermOrganizer::class);

        $listControl = new ListControl($paginatorDouble, $searchTermOrganizerDouble);

        $this->assertInstanceOf(ListControl::class, $listControl);
    }

    public function testCanGetPaginator():void
    {
        $paginatorDouble = $this->createStub(Paginator::class);
        $searchTermOrganizerDouble = $this->createStub(SearchTermOrganizer::class);

        $listControl = new ListControl($paginatorDouble, $searchTermOrganizerDouble);

        $this->assertSame($paginatorDouble, $listControl->getPaginator());
    }

    public function testCanGetSearchTermOrganizer():void
    {
        $paginatorDouble = $this->createStub(Paginator::class);
        $searchTermOrganizerDouble = $this->createStub(SearchTermOrganizer::class);

        $listControl = new ListControl($paginatorDouble, $searchTermOrganizerDouble);

        $this->assertSame($searchTermOrganizerDouble, $listControl->getSearchTermOrganizer());
    }
}
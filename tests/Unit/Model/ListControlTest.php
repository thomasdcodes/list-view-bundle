<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use Tdc\ListViewBundle\Model\ListControl;
use Tdc\ListViewBundle\Model\Paginator;

class ListControlTest extends TestCase
{
    public function testCanInit():void
    {
        $paginatorDouble = $this->createStub(Paginator::class);

        $listControl = new ListControl($paginatorDouble);

        $this->assertInstanceOf(ListControl::class, $listControl);
    }

    public function testCanGetPaginator():void
    {
        $paginatorDouble = $this->createStub(Paginator::class);

        $listControl = new ListControl($paginatorDouble);

        $this->assertSame($paginatorDouble, $listControl->getPaginator());
    }
}
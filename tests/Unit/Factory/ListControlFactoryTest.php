<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Tests\Unit\Factory;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Tdc\ListViewBundle\Factory\ListControlFactory;
use Tdc\ListViewBundle\Model\ListControl;

class ListControlFactoryTest extends TestCase
{
    public function testCanInit():void
    {
        $lcf = new ListControlFactory();

        $this->assertInstanceOf(ListControlFactory::class, $lcf);
    }

    public function testCanCreateFromRequest():void
    {
        $request = new Request([]);

        $lcf = ListControlFactory::createFromRequest($request);

        $this->assertInstanceOf(ListControl::class, $lcf);
    }
}
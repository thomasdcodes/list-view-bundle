<?php

namespace Tdc\ListViewBundle\Tests\Unit\Model\Filter;

use Tdc\ListViewBundle\Model\Filter\SimpleFilter;
use PHPUnit\Framework\TestCase;

class SimpleFilterTest extends TestCase
{

    public function test__construct(): void
    {
        $simpleFilter = new SimpleFilter('test');

        $this->assertInstanceOf(SimpleFilter::class, $simpleFilter);
    }

    public function testCreate(): void
    {
        $simpleFilter = SimpleFilter::create('test');

        $this->assertInstanceOf(SimpleFilter::class, $simpleFilter);
    }

    public function testGetValue(): void
    {
        $simpleFilter = SimpleFilter::create('test');

        $this->assertSame('test', $simpleFilter->getValue());
    }
}

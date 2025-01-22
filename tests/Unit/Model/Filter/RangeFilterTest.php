<?php

namespace Tdc\ListViewBundle\Tests\Unit\Model\Filter;

use Tdc\ListViewBundle\Model\Filter\RangeFilter;
use PHPUnit\Framework\TestCase;

class RangeFilterTest extends TestCase
{

    public function test__construct(): void
    {
        $rangeFilter = new RangeFilter(1, 3);

        $this->assertInstanceOf(RangeFilter::class, $rangeFilter);
    }

    public function testCreate(): void
    {
        $rangeFilter = RangeFilter::create(1, 3);

        $this->assertInstanceOf(RangeFilter::class, $rangeFilter);
    }

    public function testGetMin(): void
    {
        $rangeFilter = RangeFilter::create(1, 3);

        $this->assertSame(1, $rangeFilter->getMin());
    }

    public function testGetMax(): void
    {
        $rangeFilter = RangeFilter::create(1, 3);

        $this->assertSame(3, $rangeFilter->getMax());
    }
}

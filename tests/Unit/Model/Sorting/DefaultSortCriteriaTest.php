<?php

namespace Tdc\ListViewBundle\Tests\Unit\Model\Sorting;

use Tdc\ListViewBundle\Model\Sorting\DefaultSortCriteria;
use PHPUnit\Framework\TestCase;
use Tdc\ListViewBundle\Model\Sorting\SortingDirectionEnum;

class DefaultSortCriteriaTest extends TestCase
{
    public function testCanInit(): void
    {
        $sortCriteria = new DefaultSortCriteria('name', SortingDirectionEnum::ASC);

        $this->assertInstanceOf(DefaultSortCriteria::class, $sortCriteria);
    }

    public function testCanInitWithFactory(): void
    {
        $sortCriteria = DefaultSortCriteria::create('name', SortingDirectionEnum::ASC);

        $this->assertInstanceOf(DefaultSortCriteria::class, $sortCriteria);
    }

    public function testCanGetPropertyName(): void
    {
        $sortCriteria = new DefaultSortCriteria('name', SortingDirectionEnum::ASC);

        $this->assertEquals('name', $sortCriteria->getPropertyName());
    }

    public function testCanGetSortingDirection(): void
    {
        $sortCriteria = new DefaultSortCriteria('name', SortingDirectionEnum::ASC);

        $this->assertEquals('ASC', $sortCriteria->getDirection()->value);
    }

    public function testCanToggleSortingDirection(): void
    {
        $sortCriteria = new DefaultSortCriteria('name', SortingDirectionEnum::ASC);

        $sortCriteria->toggleDirection();

        $this->assertEquals('DESC', $sortCriteria->getDirection()->value);
    }

    public function testCanSayIfAscOrDescending(): void
    {
        $sortCriteria = new DefaultSortCriteria('name', SortingDirectionEnum::ASC);

        $this->assertTrue($sortCriteria->isAscending());
        $this->assertFalse($sortCriteria->isDescending());

        $sortCriteria->toggleDirection();

        $this->assertFalse($sortCriteria->isAscending());
        $this->assertTrue($sortCriteria->isDescending());
    }
}

<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Model\Filter;

use Tdc\ListViewBundle\Tests\Unit\Model\Filter\RangeFilterTest;

/**
 * @see RangeFilterTest
 */
readonly class RangeFilter implements FilterInterface
{
    public static function create(mixed $min, mixed $max): RangeFilter
    {
        return new self($min, $max);
    }

    public function __construct(private mixed $min, private mixed $max)
    {
    }

    public function getMin(): mixed
    {
        return $this->min;
    }

    public function getMax(): mixed
    {
        return $this->max;
    }
}
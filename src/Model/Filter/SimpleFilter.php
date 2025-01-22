<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Model\Filter;

use Tdc\ListViewBundle\Tests\Unit\Model\Filter\SimpleFilterTest;

/**
 * @see SimpleFilterTest
 */
readonly class SimpleFilter implements FilterInterface
{
    public static function create(string $value): SimpleFilter
    {
        return new self($value);
    }

    public function __construct(private string $value)
    {
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
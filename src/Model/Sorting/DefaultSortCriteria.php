<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Model\Sorting;

use Tdc\ListViewBundle\Tests\Unit\Model\Sorting\DefaultSortCriteriaTest;

/**
 * This class holds the information (name, sort direction) about the column for sorting.
 * @see DefaultSortCriteriaTest
 */
class DefaultSortCriteria implements SortCriteriaInterface
{
    public static function create(string $propertyName, SortingDirectionEnum $direction): DefaultSortCriteria
    {
        return new self($propertyName, $direction);
    }

    public function __construct(
        private readonly string      $propertyName,
        private SortingDirectionEnum $direction
    )
    {
    }

    public function getPropertyName(): string
    {
        return $this->propertyName;
    }

    public function getDirection(): SortingDirectionEnum
    {
        return $this->direction;
    }

    public function toggleDirection(): void
    {
        $this->direction = ($this->direction === SortingDirectionEnum::ASC) ? SortingDirectionEnum::DESC : SortingDirectionEnum::ASC;
    }

    public function isAscending(): bool
    {
        return $this->direction === SortingDirectionEnum::ASC;
    }

    public function isDescending(): bool
    {
        return $this->direction === SortingDirectionEnum::DESC;
    }
}
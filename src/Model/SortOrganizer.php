<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Model;

use Symfony\Component\HttpFoundation\Request;
use Tdc\ListViewBundle\Model\Sorting\DefaultSortCriteria;
use Tdc\ListViewBundle\Model\Sorting\SortCriteriaInterface;
use Tdc\ListViewBundle\Model\Sorting\SortingDirectionEnum;
use Tdc\ListViewBundle\Tests\Unit\Model\SortOrganizerTest;

/**
 * This class organize all columns for sorting in the right order -> first in = lowest priority
 * @see SortOrganizerTest
 */
class SortOrganizer
{
    /** @var SortCriteriaInterface[] */
    private array $sortingCriteria = [];

    public static function createFromRequest(Request $request): SortOrganizer
    {
        $instance = new self();

        foreach ($request->query->all('sort') as $propertyName => $direction) {

            $directionEnum = SortingDirectionEnum::tryFrom($direction) ?? SortingDirectionEnum::ASC;
            $instance->addSortingFacet(DefaultSortCriteria::create($propertyName, $directionEnum));
        }

        return $instance;
    }

    public function hasCriteria(string $propertyName): bool
    {
        foreach ($this->sortingCriteria as $criteria) {
            if ($criteria->getPropertyName() === $propertyName) {
                return true;
            }
        }

        return false;
    }

    public function addSortingFacet(SortCriteriaInterface $sortCriteria): void
    {
        if (!$this->hasCriteria($sortCriteria->getPropertyName())) {
            $this->sortingCriteria = array_merge([$sortCriteria], $this->sortingCriteria);
        }
    }

    public function removeSortingFacet(string $propertyName): void
    {
        foreach ($this->sortingCriteria as $key => $criteria) {
            if ($criteria->getPropertyName() === $propertyName) {
                unset($this->sortingCriteria[$key]);
            }
        }
    }

    public function getSortingCriteria(): array
    {
        return $this->sortingCriteria;
    }

    public function getNumberOfCriteria(): int
    {
        return count($this->sortingCriteria);
    }
}
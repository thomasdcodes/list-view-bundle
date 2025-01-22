<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Model;

use Symfony\Component\HttpFoundation\Request;
use Tdc\ListViewBundle\Model\Filter\FilterInterface;
use Tdc\ListViewBundle\Model\Filter\RangeFilter;
use Tdc\ListViewBundle\Model\Filter\SimpleFilter;
use Tdc\ListViewBundle\Tests\Unit\Model\FilterOrganizerTest;

/**
 * This class holds any values from the request for filtering. They have to named "filter" inside the get parameters.
 * @see FilterOrganizerTest
 */
class FilterOrganizer
{
    private array $filters = [];

    public static function createFromRequest(Request $request): FilterOrganizer
    {
        $instance = new self();

        foreach ($request->query->all('filter') as $name => $value) {
            if (is_string($value)) {
                $filter = SimpleFilter::create($value);
            } elseif (is_array($value)) {
                $filter = RangeFilter::create(...$value);
            } else {
                continue;
            }

            $instance->addFilter($name, $filter);
        }

        return $instance;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function addFilter(string $name, FilterInterface $filter): void
    {
        $this->filters[$name] = $filter;
    }

    public function removeFilter(string $name): void
    {
        if (array_key_exists($name, $this->filters)) {
            unset($this->filters[$name]);
        }
    }
}
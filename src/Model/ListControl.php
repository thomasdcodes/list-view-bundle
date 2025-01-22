<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Model;

use Tdc\ListViewBundle\Model\Filter\FilterInterface;
use Tdc\ListViewBundle\Tests\Unit\Model\ListControlTest;

/**
 * Dieses Model hält alle Informationen bereit, die für eine Listenansicht von belang sind:
 * Suche nach / Suchwort
 * OrderBy
 * Filter
 * Paginator
 *
 * @see ListControlTest
 */
class ListControl
{
    public function __construct(
        private readonly Paginator $paginator,
        private readonly SearchTermOrganizer $searchTermOrganizer,
        private readonly FilterOrganizer $filterOrganizer,
    )
    {
    }

    public function getPaginator(): Paginator
    {
        return $this->paginator;
    }

    public function getSearchTermOrganizer(): SearchTermOrganizer
    {
        return $this->searchTermOrganizer;
    }

    public function getFilterOrganizer(): FilterOrganizer
    {
        return $this->filterOrganizer;
    }
}
<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Model;

/**
 * Dieses Model hält alle Informationen bereit, die für eine Listenansicht von belang sind:
 * Suche nach / Suchwort
 * OrderBy
 * Filter
 * Paginator
 */
class ListControl
{
    public function __construct(
        private readonly Paginator $paginator,
    )
    {
    }

    public function getPaginator(): Paginator
    {
        return $this->paginator;
    }
}
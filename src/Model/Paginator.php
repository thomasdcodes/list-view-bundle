<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Model;

use Symfony\Component\HttpFoundation\Request;

class Paginator
{
    private int $total = 0;

    public function __construct(
        private int $page = 1,
        private int $resultsPerPage = 200,
    )
    {
    }

    public static function createFromRequest(Request $request): Paginator
    {
        return new Paginator(
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 100),
        );
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): Paginator
    {
        $this->total = $total;
        return $this;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): Paginator
    {
        $this->page = $page;
        return $this;
    }

    public function getResultsPerPage(): int
    {
        return $this->resultsPerPage;
    }

    public function setResultsPerPage(int $resultsPerPage): Paginator
    {
        $this->resultsPerPage = $resultsPerPage;
        return $this;
    }

    public function getOffset(): int
    {
        return ($this->page - 1) * $this->resultsPerPage;
    }

    public function numberOfPages(): int
    {
        return (int)ceil($this->total / $this->resultsPerPage);
    }
}
<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Model;

use Symfony\Component\HttpFoundation\Request;

class SearchTermOrganizer
{
    private ?string $searchTerm = null;

    public static function createFromRequest(Request $request): SearchTermOrganizer
    {
        return (new SearchTermOrganizer())
            ->setSearchTerm($request->query->get('search'))
        ;
    }

    public function setSearchTerm(?string $searchTerm): static
    {
        $this->searchTerm = $searchTerm;
        return $this;
    }

    public function getSearchTerm(): ?string
    {
        return $this->searchTerm;
    }
}
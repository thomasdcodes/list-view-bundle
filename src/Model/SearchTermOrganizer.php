<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Model;

use Symfony\Component\HttpFoundation\Request;

class SearchTermOrganizer
{
    public static function createFromRequest(Request $request): SearchTermOrganizer
    {
        $searchTermOrganizer = new SearchTermOrganizer();
    }
}
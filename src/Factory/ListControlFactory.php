<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Factory;

use Symfony\Component\HttpFoundation\Request;
use Tdc\ListViewBundle\Model\ListControl;
use Tdc\ListViewBundle\Model\Paginator;
use Tdc\ListViewBundle\Model\SearchTermOrganizer;

/**
 * Creates a ListControl instance from request object
 */
class ListControlFactory
{
    public static function createFromRequest(Request $request): ListControl
    {
        return new ListControl(
            Paginator::createFromRequest($request),
            SearchTermOrganizer::createFromRequest($request)
        );
    }
}
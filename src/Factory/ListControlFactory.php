<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Factory;

use Symfony\Component\HttpFoundation\Request;
use Tdc\ListViewBundle\Model\FilterOrganizer;
use Tdc\ListViewBundle\Model\ListControl;
use Tdc\ListViewBundle\Model\Paginator;
use Tdc\ListViewBundle\Model\SearchTermOrganizer;
use Tdc\ListViewBundle\Model\SortOrganizer;
use Tdc\ListViewBundle\Tests\Unit\Factory\ListControlFactoryTest;

/**
 * Creates a ListControl instance from request object
 * @see ListControlFactoryTest
 */
class ListControlFactory
{
    public static function createFromRequest(Request $request): ListControl
    {
        return new ListControl(
            Paginator::createFromRequest($request),
            SearchTermOrganizer::createFromRequest($request),
            FilterOrganizer::createFromRequest($request),
            SortOrganizer::createFromRequest($request),
        );
    }
}
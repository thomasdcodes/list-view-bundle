<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use Tdc\ListViewBundle\Model\SearchTermOrganizer;

class SearchTermOrganizerTest extends TestCase
{
    public function testCanInit(): void
    {
        $searchTermOrganizer = new SearchTermOrganizer();

        $this->assertInstanceOf(SearchTermOrganizer::class, $searchTermOrganizer);
    }


}
<?php

declare(strict_types=1);

namespace Tdc\ListViewBundle\Tests\Unit\Model;

use Symfony\Component\HttpFoundation\Request;
use Tdc\ListViewBundle\Model\Paginator;
use PHPUnit\Framework\TestCase;

class PaginatorTest extends TestCase
{
    public function testCanInitialize(): void
    {
        $paginator = new Paginator();

        $this->assertInstanceOf(Paginator::class, $paginator);
    }

    public function testInitializedWithDefaultValues(): void
    {
        $paginator = new Paginator();

        $this->assertSame(1, $paginator->getPage());
        $this->assertSame(0, $paginator->getTotal());
        $this->assertSame(200, $paginator->getResultsPerPage());
    }

    public function testSetter(): void
    {
        $paginator = new Paginator();

        $paginator->setPage(2);
        $paginator->setTotal(204);
        $paginator->setResultsPerPage(203);

        $this->assertSame(2, $paginator->getPage());
        $this->assertSame(204, $paginator->getTotal());
        $this->assertSame(203, $paginator->getResultsPerPage());
    }

    public function testCanCalculateOffset(): void
    {
        $paginator = new Paginator();

        $paginator->setPage(3);
        $this->assertSame(400, $paginator->getOffset());

        $paginator->setPage(1);
        $this->assertSame(0, $paginator->getOffset());

        $paginator->setPage(2);
        $paginator->setResultsPerPage(100);
        $this->assertSame(100, $paginator->getOffset());
    }

    public function testCanCalculateNumberOfPages(): void
    {
        $paginator = new Paginator();

        $paginator->setTotal(1155);
        $this->assertSame(6, $paginator->numberOfPages());

        $paginator->setTotal(1155);
        $paginator->setResultsPerPage(100);
        $this->assertSame(12, $paginator->numberOfPages());
    }

    public function testRoundingIsOnlyUp()
    {
        $paginator = new Paginator();

        $paginator->setTotal(20);
        $paginator->setResultsPerPage(11);

        $this->assertSame(2, $paginator->numberOfPages());
    }

    public function testCanCreateInstanceFromRequest(): void
    {
        $request = new Request(['page' => 2, 'limit' => 200]);

        $paginator = Paginator::createFromRequest($request);
        $paginator->setTotal(1155);

        $this->assertSame(200, $paginator->getResultsPerPage());
        $this->assertSame(2, $paginator->getPage());
        $this->assertSame(6, $paginator->numberOfPages());
    }
}
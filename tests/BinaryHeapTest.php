<?php

declare(strict_types=1);

namespace Akondas\Tests;

use Akondas\BinaryHeap;
use PHPUnit\Framework\TestCase;

final class BinaryHeapTest extends TestCase
{
    public function testIsEmpty(): void
    {
        $heap = new BinaryHeap(function ($x) {
            return $x;
        });

        self::assertTrue($heap->isEmpty());
    }
}

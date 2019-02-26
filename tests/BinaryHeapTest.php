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

    /**
     * @dataProvider heapDataProvider
     *
     * @param mixed $peak
     */
    public function testHeap(array $nodes, callable $scoreFunction, $peak): void
    {
        $heap = new BinaryHeap($scoreFunction);
        foreach ($nodes as $node) {
            $heap->push($node);
        }

        self::assertEquals($peak, $heap->peek());
    }

    public function heapDataProvider(): array
    {
        return [
            [[10, 5, 3, 2, 1, 7], function ($node) {
                return $node;
            }, 1], // min heap
            [[7, 5, 3, 2, 1, 10], function ($node) {
                return -$node;
            }, 10], // max heap
            [[[1, 7], [2, 5], [3, 3], [4, 2], [5, 1], [6, 10]], function ($node) {
                return -$node[1];
            }, [6, 10]] // array heap
        ];
    }
}

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

    public function testSize(): void
    {
        $heap = new BinaryHeap(function ($x) {
            return $x;
        });
        $heap->push(1);
        $heap->push(2);
        $heap->push(3);

        self::assertEquals(3, $heap->size());
    }

    public function testNodes(): void
    {
        $heap = new BinaryHeap(function ($x) {
            return $x;
        });
        $heap->push(1);
        $heap->push(2);
        $heap->push(3);

        self::assertEquals([1,2,3], $heap->nodes());
    }

    /**
     * @dataProvider heapPeakDataProvider
     *
     * @param mixed $peak
     */
    public function testHeapPeak(array $nodes, callable $scoreFunction, $peak): void
    {
        $heap = new BinaryHeap($scoreFunction);
        foreach ($nodes as $node) {
            $heap->push($node);
        }

        self::assertEquals($peak, $heap->peek());
    }

    /**
     * @dataProvider heapPopDataProvider
     *
     * @param mixed $peak
     */
    public function testHeapPop(array $nodes, callable $scoreFunction, $peak): void
    {
        $heap = new BinaryHeap($scoreFunction);
        foreach ($nodes as $node) {
            $heap->push($node);
        }
        $heap->pop();

        self::assertEquals($peak, $heap->peek());
    }

    public function heapPeakDataProvider(): array
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

    public function heapPopDataProvider(): array
    {
        return [
            [[10, 5, 3, 2, 1, 7], function ($node) {
                return $node;
            }, 2], // min heap
            [[7, 5, 3, 2, 1, 10], function ($node) {
                return -$node;
            }, 7], // max heap
            [[[1, 7], [2, 5], [3, 3], [4, 2], [5, 1], [6, 10]], function ($node) {
                return -$node[1];
            }, [1, 7]] // array heap
        ];
    }
}

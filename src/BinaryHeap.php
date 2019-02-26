<?php

declare(strict_types=1);

namespace Akondas;

final class BinaryHeap implements Heap
{
    /**
     * @var mixed[]
     */
    private $nodes = [];

    /**
     * @var callable
     */
    private $scoreFunction;

    public function __construct(callable $scoreFunction)
    {
        $this->scoreFunction = $scoreFunction;
    }

    public function peek()
    {
        return $this->nodes[0];
    }

    public function push($node): void
    {
        $this->nodes[] = $node;
        $this->bubbleUp(count($this->nodes) - 1);
    }

    public function pop()
    {
        // TODO: Implement pop() method.
    }

    public function size(): int
    {
        return count($this->nodes);
    }

    public function isEmpty(): bool
    {
        return $this->nodes === [];
    }

    private function bubbleUp(int $index): void
    {
        $node = $this->nodes[$index];
        $score = ($this->scoreFunction)($node);

        while ($index > 0) {
            $parentIndex = (int) floor(($index + 1) / 2) - 1;
            $parent = $this->nodes[$parentIndex];

            if ($score >= ($this->scoreFunction)($parent)) {
                break;
            }

            $this->nodes[$parentIndex] = $node;
            $this->nodes[$index] = $parent;
            $index = $parentIndex;
        }
    }
}

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
        $peek = $this->nodes[0];
        $last = array_pop($this->nodes);

        if (!$this->isEmpty()) {
            $this->nodes[0] = $last;
            $this->sinkDown(0);
        }

        return $peek;
    }

    public function size(): int
    {
        return count($this->nodes);
    }

    public function isEmpty(): bool
    {
        return $this->nodes === [];
    }

    public function nodes(): array
    {
        return $this->nodes;
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

    private function sinkDown(int $index): void
    {
        $size = $this->size();
        $node = $this->nodes[$index];
        $score = ($this->scoreFunction)($node);

        while (true) {
            $child2Index = ($index + 1) * 2;
            $child1Index = $child2Index - 1;
            $swap = null;

            if ($child1Index < $size && ($child1Score = ($this->scoreFunction)($this->nodes[$child1Index])) < $score) {
                $swap = $child1Index;
            }

            if ($child2Index < $size && ($this->scoreFunction)($this->nodes[$child2Index]) < ($swap === null ? $score : $child1Score)) {
                $swap = $child2Index;
            }

            if ($swap === null) {
                break;
            }

            $this->nodes[$index] = $this->nodes[$swap];
            $this->nodes[$swap] = $node;
            $index = $swap;
        }
    }
}

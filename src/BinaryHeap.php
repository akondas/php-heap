<?php

declare(strict_types=1);

namespace Akondas;

final class BinaryHeap implements Heap
{
    /**
     * @var array
     */
    private $elements = [];

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
        // TODO: Implement peek() method.
    }

    public function push($element): void
    {
        // TODO: Implement push() method.
    }

    public function pop()
    {
        // TODO: Implement pop() method.
    }

    public function size(): int
    {
        return count($this->elements);
    }

    public function isEmpty(): bool
    {
        return $this->elements === [];
    }
}

<?php

declare(strict_types=1);

namespace Akondas;

interface Heap
{
    /**
     * @return mixed
     */
    public function peek();

    /**
     * @param mixed $node
     */
    public function push($node): void;

    /**
     * @return mixed
     */
    public function pop();

    public function size(): int;

    public function isEmpty(): bool;

    public function nodes(): array;
}

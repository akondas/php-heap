[DEPRACTED] Moved to https://github.com/php-ai/php-data-structures

# PHP-Heap

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg)](https://php.net/)
[![Build Status](https://travis-ci.org/akondas/php-heap.svg?branch=master)](https://travis-ci.org/akondas/php-heap)

Heap - specialized tree-based data structure.

This repository contains different heap implementations written in pure PHP.

```php
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
```

## BinaryHeap

Find max/min complexity `Θ(1)`, faster than php native `sort` (check benchmarks).

<?php

declare(strict_types=1);

namespace PhpMLab\Contracts\Factories;

use PhpMLab\NdArray\NdArray;

/**
 * Interface NdArrayBuilderInterface
 *
 * @template T
 */
interface NdArrayBuilderInterface
{
    /**
     * Build an NdArray using the specified shape.
     *
     * @param array<int> $shape
     * @return NdArray<T>
     */
    public function build(array $shape): NdArray;
}
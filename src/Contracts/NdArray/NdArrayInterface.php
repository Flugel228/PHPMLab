<?php

declare(strict_types=1);

namespace PhpMLab\Contracts\NdArray;

/**
 * Interface NdArrayInterface
 *
 * @template T
 */
interface NdArrayInterface
{
    /**
     * Get the shape of the array.
     *
     * @return array<int>
     */
    public function shape(): array;

    /**
     * Get the data of the array.
     *
     * @return array<T>
     */
    public function getData(): array;

    /**
     * @return void
     */
    public function printNdArray(): void;
}
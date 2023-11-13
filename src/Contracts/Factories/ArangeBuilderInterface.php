<?php

declare(strict_types=1);

namespace PhpMLab\Contracts\Factories;

use PhpMLab\NdArray\NdArray;

/**
 * Interface ArangeBuilderInterface
 *
 * @template T
 */
interface ArangeBuilderInterface
{
    /**
     * Build an NdArray using the specified shape.
     *
     * @param int|float $start
     * @param int|float|null $stop
     * @param int|float $step
     * @param string|null $dtype
     * @return NdArray<T>
     */
    public function build(int|float $start, int|float|null $stop = null, int|float $step = 1, ?string $dtype = null): NdArray;

    /**
     * Convert the value to the specified dtype.
     *
     * @param float|int|string|bool $value
     * @param string $dtype
     *
     * @return float|int|string|bool
     */
    public function convertToType(float|int|string|bool $value, string $dtype): float|int|string|bool;
}
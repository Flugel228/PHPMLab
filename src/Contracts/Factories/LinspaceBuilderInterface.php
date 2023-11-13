<?php

declare(strict_types=1);

namespace PhpMLab\Contracts\Factories;

use PhpMLab\NdArray\NdArray;

/**
 * Interface LinspaceBuilderInterface
 *
 * @template T
 *
 * @phpstan-type ArrayWithStep array{NdArray<T>, int|float}
 */
interface LinspaceBuilderInterface
{
    /**
     * Build an NdArray using the specified shape.
     *
     * @param int|float $start
     * @param int|float|null $stop
     * @param int $num
     * @param bool $endpoint
     * @param bool $retstep
     * @param string|null $dtype
     * @return NdArray<T>|ArrayWithStep
     */
    public function build(int|float $start, int|float $stop = null, int $num = 50, bool $endpoint = false, bool $retstep = false, ?string $dtype = null): NdArray|array;

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
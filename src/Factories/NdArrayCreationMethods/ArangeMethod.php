<?php

namespace PhpMLab\Factories\NdArrayCreationMethods;

use PhpMLab\Contracts\Factories\ArangeBuilderInterface;
use PhpMLab\Factories\NdArrayCreationMethods\Traits\TypeConversionTrait;
use PhpMLab\NdArray\NdArray;

/**
 * Class OnesMethod
 *
 * @implements ArangeBuilderInterface<float|int|string|bool>
 */
class ArangeMethod implements ArangeBuilderInterface
{
    use TypeConversionTrait;
    /**
     * Create a NdArray with evenly spaced values within the specified interval.
     *
     * This method generates an array of values starting from the specified $start,
     * up to (but not including) the $stop value, with a specified step size.
     *
     * @param int|float $start The starting value of the sequence.
     * @param int|float|null $stop The end value of the sequence. If null, the sequence will end at $start.
     * @param int|float $step The step size between values in the sequence.
     * @param string|null $dtype The data type to which each element in the sequence should be converted.
     *                           Supported types: "float", "int", "string", "bool".
     *
     * @return NdArray<float|int|string|bool> A NdArray containing the generated sequence of values.
     */
    public function build(int|float $start, int|float|null $stop = null, float|int $step = 1, ?string $dtype = null): NdArray
    {
        if ($stop === null) {
            $stop = $start;
            $start = 0;
        }

        $result = [];
        $current = $start;

        while (($step > 0 && $current < $stop) || ($step < 0 && $current > $stop)) {
            $result[] = $dtype !== null ? $this->convertToType($current, $dtype) : $current;
            $current += $step;
        }

        return new NdArray($result);
    }
}
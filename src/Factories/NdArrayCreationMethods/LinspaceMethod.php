<?php

namespace PhpMLab\Factories\NdArrayCreationMethods;

use InvalidArgumentException;
use PhpMLab\Contracts\Factories\ArangeBuilderInterface;
use PhpMLab\Contracts\Factories\LinspaceBuilderInterface;
use PhpMLab\Factories\NdArrayCreationMethods\Traits\TypeConversionTrait;
use PhpMLab\NdArray\NdArray;

/**
 * Class OnesMethod
 *
 * @implements LinspaceBuilderInterface<float|int|string|bool>
 *
 * @phpstan-type ArrayWithStep array{NdArray<float|int|string|bool>, int|float}
 */
class LinspaceMethod implements LinspaceBuilderInterface
{
    use TypeConversionTrait;

    /**
     * Builds an NdArray or an array with step values using the specified parameters.
     *
     * This method generates a sequence of values based on the specified start, stop, and step parameters.
     * The sequence can be returned as an NdArray or as an array along with the step size, depending on the
     * value of the $retstep parameter.
     *
     * @param int|float $start The starting value of the sequence.
     * @param int|float|null $stop The end value of the sequence. If null, the sequence will end at $start.
     * @param int $num The number of values to generate in the sequence.
     * @param bool $endpoint If true, the stop value is included in the sequence. Otherwise, it is excluded.
     * @param bool $retstep If true, the method returns an array containing both the NdArray and the step size.
     * @param string|null $dtype The data type to which each element in the sequence should be converted.
     *                           Supported types: "float", "int", "string", "bool".
     *
     * @return NdArray<float|int|string|bool>|ArrayWithStep An NdArray or an array with NdArray and step value.
     */
    public function build(float|int $start, float|int $stop = null, int $num = 50, bool $endpoint = false, bool $retstep = false, ?string $dtype = null): NdArray|array
    {

        if ($endpoint) {
            $step = ($stop - $start) / ($num - 1);
        } else {
            $step = ($stop - $start) / $num;
        }

        if ($stop === null) {
            $stop = $start;
            $start = 0;
        }

        $result = [];

        for ($i = 0; $i < $num; $i++) {
            $value = $start + $i * $step;
            $result[] = $dtype !== null ? $this->convertToType($value, $dtype) : $value;
        }

        if ($retstep) {
            return [new NdArray($result), $step];
        }

        return new NdArray($result);
    }
}
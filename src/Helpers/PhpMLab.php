<?php

namespace PhpMLab\Helpers;

use PhpMLab\Enums\CreationMethodEnum;
use PhpMLab\Factories\NdArrayFactory;
use PhpMLab\NdArray\NdArray;

/**
 * @phpstan-type ArrayWithStep array{NdArray<float|int|string|bool>, int|float}
 */
class PhpMLab
{
    /**
     * Builds an NdArray using the provided data in the form of an array.
     *
     * @param array<int> $data The data to be used for creating the NdArray.
     *
     * @return NdArray<int> The NdArray created from the provided data.
     */
    public static function array(array $data): NdArray
    {
        $factory = self::getFactory();
        /** @var NdArray<int> $array */
        $array = $factory->create(CreationMethodEnum::ARRAY, $data);
        return $array;
    }

    /**
     * Build a NdArray filled with zeros using the specified shape.
     *
     * @param array<int> $shape The shape of the NdArray to be created. Each element represents the size of
     *                          the corresponding dimension in the NdArray.
     *
     * @return NdArray<int> A NdArray filled with zeros and having the specified shape.
     */
    public static function zeros(array $shape): NdArray
    {
        $factory = self::getFactory();
        /** @var NdArray<int> $array */
        $array = $factory->create(CreationMethodEnum::ZEROS, $shape);
        return $array;
    }

    /**
     * Build an NdArray filled with ones using the specified shape.
     *
     * @param array<int> $shape The shape of the NdArray to be created. Each element represents the size of
     *                          the corresponding dimension in the NdArray.
     *
     * @return NdArray<int> A NdArray filled with ones and having the specified shape.
     */
    public static function ones(array $shape): NdArray
    {
        $factory = self::getFactory();
        /** @var NdArray<int> $array */
        $array = $factory->create(CreationMethodEnum::ONES, $shape);
        return $array;
    }

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

    public static function arange(int|float $start, int|float|null $stop = null, float|int $step = 1, ?string $dtype = null): NdArray
    {
        $factory = self::getFactory();
        return $factory->createArange($start, $stop, $step, $dtype);
    }

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
    public static function linspace(float|int $start, float|int $stop = null, int $num = 50, bool $endpoint = false, bool $retstep = false, ?string $dtype = null): NdArray|array
    {
        $factory = self::getFactory();
        /** @var NdArray<float|int|string|bool>|ArrayWithStep $array */
        $array = $factory->createLinspace($start, $stop, $num, $endpoint, $retstep, $dtype);
        return $array;
    }

    /**
     * Get the NdArrayFactory instance.
     *
     * @return NdArrayFactory
     */
    private static function getFactory(): NdArrayFactory
    {
        return new NdArrayFactory();
    }
}
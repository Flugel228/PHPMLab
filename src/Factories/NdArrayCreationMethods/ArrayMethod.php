<?php

namespace PhpMLab\Factories\NdArrayCreationMethods;

use PhpMLab\Contracts\Factories\NdArrayBuilderInterface;
use PhpMLab\NdArray\NdArray;

/**
 * Class ArrayMethod
 *
 * @implements NdArrayBuilderInterface<int>
 */
class ArrayMethod implements NdArrayBuilderInterface
{
    /**
     * Builds an NdArray using the provided data in the form of an array.
     *
     * @param array<mixed> $data The data to be used for creating the NdArray.
     *
     * @return NdArray<int> The NdArray created from the provided data.
     */
    public function build(array $data): NdArray
    {
        /** @var NdArray<int> $ndArray */
        $ndArray = new NdArray($data);
        return $ndArray;
    }
}
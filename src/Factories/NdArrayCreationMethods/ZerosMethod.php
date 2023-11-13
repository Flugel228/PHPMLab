<?php

namespace PhpMLab\Factories\NdArrayCreationMethods;

use PhpMLab\Contracts\Factories\NdArrayBuilderInterface;
use PhpMLab\Factories\NdArrayCreationMethods\Traits\ArrayInitializationTrait;
use PhpMLab\NdArray\NdArray;

/**
 * Class ZerosMethod
 *
 * @implements NdArrayBuilderInterface<int>
 */
class ZerosMethod implements NdArrayBuilderInterface
{
    use ArrayInitializationTrait;
    /**
     * Build a NdArray filled with zeros using the specified shape.
     *
     * @param array<int> $shape The shape of the NdArray to be created. Each element represents the size of
     *                          the corresponding dimension in the NdArray.
     *
     * @return NdArray<int> A NdArray filled with zeros and having the specified shape.
     */
    public function build(array $shape): NdArray
    {
        if (empty($shape)) {
            return new NdArray([]);
        }
        /** @var array<int> $data */
        $data = $this->createNestedArray($shape, 0);
        return new NdArray($data);
    }
}
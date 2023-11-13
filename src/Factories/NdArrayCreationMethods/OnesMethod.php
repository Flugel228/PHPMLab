<?php

namespace PhpMLab\Factories\NdArrayCreationMethods;

use PhpMLab\Contracts\Factories\NdArrayBuilderInterface;
use PhpMLab\Factories\NdArrayCreationMethods\Traits\ArrayInitializationTrait;
use PhpMLab\NdArray\NdArray;

/**
 * Class OnesMethod
 *
 * @implements NdArrayBuilderInterface<int>
 */
class OnesMethod implements NdArrayBuilderInterface
{
    use ArrayInitializationTrait;
    /**
     * Build an NdArray filled with ones using the specified shape.
     *
     * @param array<int> $shape The shape of the NdArray to be created. Each element represents the size of
     *                          the corresponding dimension in the NdArray.
     *
     * @return NdArray<int> A NdArray filled with ones and having the specified shape.
     */
    public function build(array $shape): NdArray
    {
        if (empty($shape)) {
            return new NdArray([]);
        }
        /** @var array<int> $data */
        $data = $this->createNestedArray($shape, 1);
        return new NdArray($data);
    }
}
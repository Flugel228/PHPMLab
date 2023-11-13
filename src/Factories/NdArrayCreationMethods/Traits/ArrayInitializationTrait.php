<?php

namespace PhpMLab\Factories\NdArrayCreationMethods\Traits;

trait ArrayInitializationTrait
{
    /**
     * Creates a multidimensional array of specified sizes, filled with initial values.
     * @param array<int> $dimensions Array sizes for each nesting level.
     * @param mixed $initialValue The initial value with which the array is filled.
     * @return array|mixed A multidimensional array filled with an initial value.
     */
    private function createNestedArray(array $dimensions, mixed $initialValue) {
        if (empty($dimensions)) {
            return $initialValue;
        }

        $currentDimension = array_shift($dimensions);

        $nestedArray = array();
        for ($i = 0; $i < $currentDimension; $i++) {
            $nestedArray[$i] = $this->createNestedArray($dimensions, $initialValue);
        }

        return $nestedArray;
    }
}
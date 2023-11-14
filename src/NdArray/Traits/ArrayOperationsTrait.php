<?php

namespace PhpMLab\NdArray\Traits;


use UnexpectedValueException;

trait ArrayOperationsTrait
{
    /**
     * Flattens a nested array, converting it into a one-dimensional array.
     *
     * @param array<mixed> $array The input array to be flattened.
     *
     * @return array<mixed> The flattened one-dimensional array.
     */
    private function flattenArray(array $array): array
    {
        $result = [];
        $stack = [$array];

        while (!empty($stack)) {
            $current = array_shift($stack);

            foreach ($current as $value) {
                if (is_array($value)) {
                    $stack[] = $value;
                } else {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }

    /**
     * Reshapes an array according to the specified shape.
     *
     * This method reshapes the input array to match the specified shape. It verifies
     * if the total number of elements in the input array is equal to the product of
     * the elements in the provided shape. If not, it throws an UnexpectedValueException.
     *
     * @param array<mixed> $inputArray The input array to be reshaped.
     * @param array<int> $shape      The desired shape of the array.
     *
     * @return array<mixed> The reshaped array.
     *
     * @throws UnexpectedValueException If the total number of elements in the input array
     *                                  does not match the product of the elements in the shape.
     */
    private function reshapeArray(array $inputArray, array $shape): array
    {
        $totalElements = array_product($shape);

        $inputArrayLength = count($inputArray);
        if ($inputArrayLength !== $totalElements) {
            $theShapeIsConvertedToAString = json_encode($shape, JSON_UNESCAPED_UNICODE);
            throw new UnexpectedValueException("ValueError: cannot reshape array of size $inputArrayLength into shape $theShapeIsConvertedToAString");
        }

        $resultArray = $inputArray;


        foreach (array_reverse($shape) as $size) {
            /** @phpstan-ignore-next-line  */
            $resultArray = array_chunk($resultArray, $size);
        }

        /** @phpstan-ignore-next-line  */
        return $resultArray[0];
    }

    /**
     * Reshapes the internal data array according to the specified shape.
     *
     * This method reshapes the internal data array of the object to match the specified shape.
     *
     * @param array<int> $shape The desired shape of the array.
     *
     * @return static This object with the reshaped data.
     */
    public function reshape(array $shape): static
    {
        $data = $this->getData();
        $data = $this->flattenArray($data);
        $data = $this->reshapeArray($data, $shape);
        $this->data = $data;
        return $this;
    }
}
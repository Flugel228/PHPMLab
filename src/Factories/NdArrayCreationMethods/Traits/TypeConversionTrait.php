<?php

namespace PhpMLab\Factories\NdArrayCreationMethods\Traits;

trait TypeConversionTrait
{
    /**
     * Convert the value to the specified dtype.
     *
     * @param float|int |string|bool $value
     * @param string $dtype
     *
     * @return float|int|string|bool
     */
    public function convertToType(float|bool|int|string $value, string $dtype): float|int|string|bool
    {
        return match ($dtype) {
            'int' => (int)$value,
            'float' => (float)$value,
            'string' => (string)$value,
            'bool' => (bool)$value,
            default => $value,
        };
    }
}
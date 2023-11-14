<?php

declare(strict_types=1);

namespace PhpMLab\NdArray;

use PhpMLab\Contracts\NdArray\NdArrayInterface;
use PhpMLab\NdArray\Traits\ArrayOperationsTrait;

/**
 * Class NdArray
 *
 * @template T
 * @implements NdArrayInterface<T>
 */
class NdArray implements NdArrayInterface
{
    use ArrayOperationsTrait;

    /** @var array<T> */
    private array $data;

    /**
     * NdArray constructor.
     *
     * @param array<T> $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the data of the NdArray.
     *
     * @return array<T>
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Get the shape of the NdArray.
     *
     * @return array<int>
     */
    public function shape(): array
    {
        $dimensions = [];

        $currentArray = $this->data;
        while (is_array($currentArray)) {
            $dimensions[] = count($currentArray);
            $currentArray = current($currentArray);
        }

        return $dimensions;
    }

    public function printNdArray(): void
    {
        $data = $this->getData();
        echo json_encode($data, JSON_UNESCAPED_UNICODE) . PHP_EOL;
    }
}
<?php

declare(strict_types=1);

namespace PhpMLab\Contracts\Factories;

use PhpMLab\Contracts\NdArray\NdArrayInterface;
use PhpMLab\Contracts\Factories\NdArrayBuilderInterface;

/**
 * Interface NdArrayFactoryInterface
 *
 * @template T
 */
interface NdArrayFactoryInterface
{
    /**
     * Create an NdArray using the specified creation method.
     *
     * @param NdArrayBuilderInterface<T> $creationMethod
     * @param array<int> $shape
     *
     * @return NdArrayInterface<T>
     */
    public function create(NdArrayBuilderInterface $creationMethod, array $shape): NdArrayInterface;
}
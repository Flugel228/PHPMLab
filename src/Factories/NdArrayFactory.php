<?php

namespace PhpMLab\Factories;

use PhpMLab\Contracts\Factories\ArangeBuilderInterface;
use PhpMLab\Contracts\Factories\LinspaceBuilderInterface;
use PhpMLab\Contracts\Factories\NdArrayBuilderInterface;
use PhpMLab\Enums\CreationMethodEnum;
use PhpMLab\Factories\NdArrayCreationMethods\ArangeMethod;
use PhpMLab\Factories\NdArrayCreationMethods\LinspaceMethod;
use PhpMLab\NdArray\NdArray;


/**
 * Class NdArrayFactory
 *
 * @phpstan-type ArrayWithStep array{NdArray<float|int|string|bool>, int|float}
 */
class NdArrayFactory
{
    /**
     * Create an NdArray using the specified creation method.
     *
     * @param CreationMethodEnum $method
     * @param array<int> $shape
     * @return NdArray<int>
     */
    public function create(CreationMethodEnum $method, array $shape): NdArray
    {
        $builder = $this->getBuilder($method);
        /** @var NdArray<int> $array */
        $array = $builder->build($shape);
        return $array;
    }

    /**
     * Build an NdArray using the specified shape.
     *
     * @param int|float $start
     * @param int|float|null $stop
     * @param int|float $step
     * @param string|null $dtype
     *
     * @return NdArray<float|int|string|bool>
     */
    public function createArange(int|float $start, int|float|null $stop = null, float|int $step = 1, ?string $dtype = null): NdArray
    {
        $builder = new ArangeMethod();

        return $builder->build($start, $stop, $step, $dtype);
    }

    /**
     * Build an NdArray using the specified shape.
     *
     * @param int|float $start
     * @param int|float|null $stop
     * @param int $num
     * @param bool $endpoint
     * @param bool $retstep
     * @param string|null $dtype
     * @return NdArray<float|int|string|bool>|ArrayWithStep
     */
    public function createLinspace(float|int $start, float|int $stop = null, int $num = 50, bool $endpoint = false, bool $retstep = false, ?string $dtype = null): NdArray|array
    {
        $builder = new LinspaceMethod();

        return $builder->build($start, $stop, $num, $endpoint, $retstep, $dtype);
    }


    /**
     * @phpstan-ignore-next-line
     * @param CreationMethodEnum $method
     * @return NdArrayBuilderInterface
     */
    private function getBuilder(CreationMethodEnum $method): NdArrayBuilderInterface
    {
        return match ($method) {
            CreationMethodEnum::ARRAY => new \PhpMLab\Factories\NdArrayCreationMethods\ArrayMethod(),
            CreationMethodEnum::ZEROS => new \PhpMLab\Factories\NdArrayCreationMethods\ZerosMethod(),
            /**
             * @phpstan-ignore-next-line
             */
            CreationMethodEnum::ONES => new \PhpMLab\Factories\NdArrayCreationMethods\OnesMethod(),
            default => throw new \InvalidArgumentException("Invalid creation method: " . $method::class),
        };
    }

}
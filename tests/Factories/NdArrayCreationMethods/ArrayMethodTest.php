<?php

namespace Factories\NdArrayCreationMethods;

use PhpMLab\Contracts\NdArray\NdArrayInterface;
use PhpMLab\Factories\NdArrayCreationMethods\ArrayMethod;
use PhpMLab\NdArray\NdArray;
use PHPUnit\Framework\TestCase;

class ArrayMethodTest extends TestCase
{

    public function testBuildCorrectNdArray(): void
    {
        $data = [
            [1, 2, 3,],
            [1, 2, 3,],
            [1, 2, 3,],
        ];
        $arrayMethod = (new ArrayMethod())->build($data);
        $ndArray = NdArray::class;

        $this->assertInstanceOf($ndArray, $arrayMethod);
        $this->assertSame($data, $arrayMethod->getData());
        $this->assertSame([3,3,], $arrayMethod->shape());
    }
}

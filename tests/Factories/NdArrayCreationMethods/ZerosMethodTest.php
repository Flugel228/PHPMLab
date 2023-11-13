<?php

namespace Factories\NdArrayCreationMethods;

use PhpMLab\Factories\NdArrayCreationMethods\ZerosMethod;
use PhpMLab\NdArray\NdArray;
use PHPUnit\Framework\TestCase;

class ZerosMethodTest extends TestCase
{

    public function testBuildACorrectNdArrayFilledWithZerosUsingTheSpecifiedShape(): void
    {
        $data = [2, 3,];
        $zerosMethod = (new ZerosMethod())->build($data);
        $ndArray = NdArray::class;

        $this->assertInstanceOf($ndArray, $zerosMethod);
        $this->assertSame([
            [0, 0, 0,],
            [0, 0, 0,],
        ], $zerosMethod->getData());
        $this->assertSame([2, 3,], $zerosMethod->shape());
    }
}

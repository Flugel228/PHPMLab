<?php

namespace Factories\NdArrayCreationMethods;

use PhpMLab\Factories\NdArrayCreationMethods\OnesMethod;
use PhpMLab\NdArray\NdArray;
use PHPUnit\Framework\TestCase;

class OnesMethodTest extends TestCase
{

    public function testBuildACorrectNdArrayFilledWithOnesUsingTheSpecifiedShape(): void
    {
        $data = [2, 3,];
        $onesMethod = (new OnesMethod())->build($data);
        $ndArray = NdArray::class;

        $this->assertInstanceOf($ndArray, $onesMethod);
        $this->assertSame([
            [1, 1, 1,],
            [1, 1, 1,],
        ], $onesMethod->getData());
        $this->assertSame([2, 3,], $onesMethod->shape());
    }
}

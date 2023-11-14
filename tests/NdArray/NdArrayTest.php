<?php

namespace NdArray;

use PhpMLab\NdArray\NdArray;
use PHPUnit\Framework\TestCase;

class NdArrayTest extends TestCase
{

    public function testShapeForOneDimensionalArray(): void
    {
        $data = [1, 2, 3,];
        $ndArray = new NdArray($data);
        $shape = $ndArray->shape();

        $this->assertSame([3], $shape);
    }

    public function testShapeForTwoDimensionalArray(): void
    {
        $data = [
            [1, 2, 3,],
            [1, 2, 3,],
        ];
        $ndArray = new NdArray($data);
        $shape = $ndArray->shape();

        $this->assertSame([2, 3], $shape);
    }

    public function testGetDataMethodReturnCorrectValue(): void
    {
        $data = [
            [1, 2, 3,],
            [1, 2, 3,],
        ];
        $ndArray = new NdArray($data);
        $ndArrayData = $ndArray->getData();

        $this->assertSame($data, $ndArrayData);
    }

    public function testReshapeMethod(): void
    {
        $data = [[1],[2],[3]];
        $ndArray = (new NdArray($data))->reshape([1,1,3]);
        $ndArrayData = $ndArray->getData();

        $this->assertSame([[[1,2,3]]],$ndArrayData);
    }
}

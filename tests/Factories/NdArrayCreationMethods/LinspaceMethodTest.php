<?php

namespace Factories\NdArrayCreationMethods;

use PhpMLab\Factories\NdArrayCreationMethods\LinspaceMethod;
use PhpMLab\NdArray\NdArray;
use PHPUnit\Framework\TestCase;

class LinspaceMethodTest extends TestCase
{

    public function testBuildMethod(): void
    {
        $linspaceMethod = new LinspaceMethod();

        $start = 2;
        $stop = 10;
        $num = 4;
        $endpoint = false;
        $retstep = false;
        $dtype = 'float';

        $expectedResult = [2.0, 4.0, 6.0, 8.0];

        $result = $linspaceMethod->build($start, $stop, $num, $endpoint, $retstep, $dtype);

        $this->assertInstanceOf(NdArray::class, $result);
        $this->assertEquals($expectedResult, $result->getData());
    }

    public function testBuildMethodWithEndpointAndRetstep(): void
    {
        $linspaceMethod = new LinspaceMethod();

        $start = 2;
        $stop = 8;
        $num = 4;
        $endpoint = true;
        $retstep = true;
        $dtype = 'float';

        $expectedResult = [2.0, 4.0, 6.0, 8.0];
        $expectedStep = 2.0;

        $result = $linspaceMethod->build($start, $stop, $num, $endpoint, $retstep, $dtype);

        $this->assertIsArray($result);
        $this->assertInstanceOf(NdArray::class, $result[0]);
        $this->assertEquals($expectedResult, $result[0]->getData());
        $this->assertEquals($expectedStep, $result[1]);
    }

}

<?php

namespace Factories\NdArrayCreationMethods;

use PhpMLab\Factories\NdArrayCreationMethods\ArangeMethod;
use PhpMLab\NdArray\NdArray;
use PHPUnit\Framework\TestCase;

class ArangeMethodTest extends TestCase
{

    public function testBuildMethod(): void
    {

        $arangeMethod = new ArangeMethod();

        $result1 = $arangeMethod->build(0, 5, 1, 'int');
        $result2 = $arangeMethod->build(0, 10, 2, 'float');
        $result3 = $arangeMethod->build(0, 10, 2, 'string');
        $result4 = $arangeMethod->build(0, 10, 2, 'bool');

        $this->assertInstanceOf(NdArray::class, $result1);
        $this->assertInstanceOf(NdArray::class, $result2);
        $this->assertInstanceOf(NdArray::class, $result3);
        $this->assertInstanceOf(NdArray::class, $result4);

        $this->assertSame([0, 1, 2, 3, 4], $result1->getData());
        $this->assertSame([0.0, 2.0, 4.0, 6.0, 8.0], $result2->getData());
        $this->assertSame(['0', '2', '4', '6', '8'], $result3->getData());
        $this->assertSame([false, true, true, true, true], $result4->getData());
    }
}

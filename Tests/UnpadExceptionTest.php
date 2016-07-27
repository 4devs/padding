<?php

namespace FDevs\Padding\Tests;


abstract class UnpadExceptionTest extends PaddingTest
{
    /**
     * @return array
     */
    abstract public function getExceptionUnpad();

    /**
     * @dataProvider getExceptionUnpad
     */
    public function testExceptionUnpad($expected, $blockSize, $data)
    {
        $this->setExpectedException($expected);
        $this->init()->unpad($data, $blockSize);
    }

}

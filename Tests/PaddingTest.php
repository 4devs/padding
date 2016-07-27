<?php

namespace FDevs\Padding\Tests;

use FDevs\Padding\PaddingInterface;

abstract class PaddingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    abstract public function getSuccess();

    /**
     * @return PaddingInterface
     */
    abstract public function init();

    /**
     * test interface
     */
    public function testInterface()
    {
        $this->assertInstanceOf(PaddingInterface::class, $this->init());
    }

    /**
     * @dataProvider getSuccess
     */
    public function testSuccessPad($data, $blockSize, $expected)
    {
        $padding = $this->init();
        $this->assertEquals($expected, $padding->pad($data, $blockSize));
    }

    /**
     * @dataProvider getSuccess
     */
    public function testSuccessUnpad($expected, $blockSize, $data)
    {
        $padding = $this->init();
        $this->assertEquals($expected, $padding->unpad($data, $blockSize));
    }
}

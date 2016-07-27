<?php

namespace FDevs\Padding\Tests;

use FDevs\Padding\Exception\BlockSizeException;
use FDevs\Padding\Exception\Exception;
use FDevs\Padding\Pkcs7;

class Pkcs7Test extends UnpadExceptionTest
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        return new Pkcs7();
    }

    /**
     * @inheritDoc
     */
    public function getExceptionUnpad()
    {
        return [
            [BlockSizeException::class, 28, "123\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D"],
            [BlockSizeException::class, 1, "test\x02\x02"],
            [BlockSizeException::class, 11, "test\f\f\f\f\f\f\f\f\f\f\f\f"],
            [Exception::class, 32, "123\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D"],
            [Exception::class, 2, "test\x02"],
            [Exception::class, 17, "test\f\f\f\f\f\f\f\f\f\f\f"],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getSuccess()
    {
        return [
            ["123", 32, "123\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D\x1D"],
            ["test", 2, "test\x02\x02"],
            ["test", 16, "test\f\f\f\f\f\f\f\f\f\f\f\f"],
        ];
    }
}

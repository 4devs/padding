<?php

namespace FDevs\Padding\Tests;

use FDevs\Padding\NoPadding;

class NoPaddingTest extends PaddingTest
{
    /**
     * @inheritDoc
     */
    public function getSuccess()
    {
        return [
            ['123', 123, '123'],
            ['test', 16, 'test'],
        ];
    }

    /**
     * @inheritDoc
     */
    public function init()
    {
        return new NoPadding();
    }

}
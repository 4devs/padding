<?php

namespace FDevs\Padding;

class NoPadding implements PaddingInterface
{
    /**
     * {@inheritdoc}
     */
    public function pad($string, $blockSize = 32)
    {
        return $string;
    }

    /**
     * {@inheritdoc}
     */
    public function unpad($string, $blockSize = 32)
    {
        return $string;
    }
}

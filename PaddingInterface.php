<?php

namespace FDevs\Padding;

use FDevs\Padding\Exception\Exception;
use FDevs\Padding\Exception\BlockSizeException;

interface PaddingInterface
{
    /**
     * Pad the string to the specified size.
     *
     * @param string $string    The string to pad
     * @param int    $blockSize The size to pad to
     *
     * @return string The padded string
     *
     * @throws Exception if the padding failed
     */
    public function pad($string, $blockSize = 32);

    /**
     * Strip the padding from the supplied string.
     *
     * @param string $string    The string to trim
     * @param int    $blockSize The size to pad to
     *
     * @return string The unpadded string
     *
     * @throws Exception          if the unpadding failed
     * @throws BlockSizeException incorrect BlockSize
     */
    public function unpad($string, $blockSize = 32);
}

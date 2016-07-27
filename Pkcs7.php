<?php

namespace FDevs\Padding;

use FDevs\Padding\Exception\BlockSizeException;
use FDevs\Padding\Exception\Exception;

/**
 * PKCS#7 padding.
 */
class Pkcs7 implements PaddingInterface
{
    /**
     * {@inheritdoc}
     */
    public function pad($string, $blockSize = 32)
    {
        $pad = $blockSize - (mb_strlen($string, '8bit') % $blockSize);

        return $string.str_repeat(chr($pad), $pad);
    }

    /**
     * {@inheritdoc}
     */
    public function unpad($string, $blockSize = 32)
    {
        $end = mb_substr($string, -1, null, '8bit');
        $last = ord($end);
        $len = mb_strlen($string, '8bit') - $last;

        if ($last > $blockSize) {
            throw new BlockSizeException('Incorrect amount of PKCS#7 padding for blocksize');
        }
        if (mb_substr($string, $len, null, '8bit') != str_repeat($end, $last)) {
            throw new Exception('mismatch padding');
        }

        return mb_substr($string, 0, $len, '8bit');
    }
}

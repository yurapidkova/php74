<?php

namespace App\Encoders;

use App\EncodeInterface;

class Rot13Native implements EncodeInterface
{
    /**
     * @param string $text
     *
     * @return string
     */
    public function encode(string $text): string
    {
        return str_rot13($text);
    }
}
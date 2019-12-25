<?php

namespace App\Encoders;

use App\EncodeInterface;

class Rot13 implements EncodeInterface
{

    private const CHARS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @var int
     */
    private int $offset;

    /**
     * Rot13 constructor.
     *
     * @param int $offset
     */
    public function __construct(int $offset = 13)
    {
        $this->offset = $offset;
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function encode(string $text): string
    {

        return $text;
    }
}
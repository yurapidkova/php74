<?php

namespace App\Encoders;

use App\EncodeInterface;

class Rot13Force implements EncodeInterface
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
        $charLength = strlen(self::CHARS);

        for ($i = strlen($text) - 1; $i >= 0; $i--) {
            $pos = strpos(self::CHARS, $text[$i]);
            if($pos !== false) {
                $pos += $this->offset;

                if($pos > $charLength) {
                    $pos -= $charLength;
                }

                $text[$i] = self::CHARS[$pos];
            }
        }

        return $text;
    }
}
<?php

namespace App;

interface EncodeInterface
{
    /**
     * @param string $text
     *
     * @return string
     */
    public function encode(string $text): string;
}
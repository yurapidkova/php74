<?php

namespace App;

interface EncodeChainInterface
{
    /**
     * @param EncodeChainInterface $encoderChain
     */
    public function setNext(self $encoderChain): void;

    /**
     * @param string $text
     *
     * @return string
     */
    public function handle(string $text): string;
}
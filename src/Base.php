<?php

namespace App;

class Base
{

    /**
     * RUN
     */
    public function run()
    {
        $chain = $this->createChain();

        $chain->handle('abc. abc!abc?');
    }

    private function createChain(): EncodeChainInterface
    {
        $chain = new EncodeChain(new Encoders\Rot13());
//        $chain->setNext(new EncodeChain(new Encoders\Rot13()));
        return $chain;
    }

}
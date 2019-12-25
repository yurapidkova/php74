<?php

namespace App;

class EncodeChain implements EncodeChainInterface
{

    private ?EncodeChainInterface $next = null;
    private EncodeInterface $handler;

    /**
     * EncodeChain constructor.
     *
     * @param EncodeInterface $handler
     */
    public function __construct(EncodeInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @param EncodeChainInterface $encoderChain
     */
    public function setNext(EncodeChainInterface $encoderChain): void
    {
        $this->next = $encoderChain;
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function handle(string $text): string
    {
        try {
            $encodedText = $this->handler->encode($text);
        } catch (\Exception $e) {
            /**
             * TODO: handle exception
             * But chain have to be braked;
             */
            return '';
        }


        if ($this->next) {
            return $this->next->handle($encodedText);
        }

        return $encodedText;
    }
}
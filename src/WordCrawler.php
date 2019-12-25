<?php

namespace App;

use Generator;

/**
 * The similar to strtok(https://www.php.net/manual/ru/function.strtok.php).
 * This class created for fun/practice. )
 *
 * Class WordCrawler
 */
class WordCrawler implements \Iterator
{
    public const DELIMITER = ' ';

    private int $offset = 0;
    private int $len = 0;
    private Generator $generator;

    /**
     * @param string $text
     *
     * @return WordCrawler
     */
    public function init(string $text): self
    {
        $this->len = strlen($text);
        $this->generator = $this->crawl($text);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->generator->current();
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        $this->generator->next();
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->generator->key();
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return $this->generator->valid();
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        $this->offset = 0;
        $this->generator->rewind();
    }

    /**
     * @param string $text
     *
     * @return Generator|null
     */
    private function crawl(string $text): ?Generator
    {
        if($this->offset >= $this->len) {
            return null;
        }

        while (false !== ($position = strpos($text, self::DELIMITER, $this->offset + 1))) {
            yield substr($text, $this->offset, $position - $this->offset);
            $this->offset = $position;
        }

        yield substr($text, $this->offset);
        return;
    }

}
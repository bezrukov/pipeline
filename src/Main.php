<?php

namespace Php\pipeline;

class Main
{
    private $io;

    public function __construct(IO $io)
    {
        $this->io = $io;
    }

    private function plural($str, $symbol): string
    {
        if (substr($str, -1) === $symbol) {
            return $str;
        }

        return $str.$symbol;
    }

    public function main()
    {

        $files = $this->io->getFilesFromDir('.');
        $filtered = array_filter(
            $files,
            function ($file) {
                return strpos($file, '.') !== 0;
            }
        );
        sort($filtered);
        $middle = ExtList::middle($filtered);
        $plural = $this->plural($middle, 's');

        return mb_strtoupper($plural);
    }
}
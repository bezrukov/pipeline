<?php

namespace Php\pipeline;

class IO
{
    public function getFilesFromDir($dir): array
    {
        return scandir($dir, SCANDIR_SORT_NONE);
    }
}
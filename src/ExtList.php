<?php

namespace Php\pipeline;

class ExtList
{
    public static function middle($list)
    {
        $middle = round(count($list)/2);
        return $list[$middle - 1];
    }
}
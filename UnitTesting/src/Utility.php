<?php
namespace App;

class Utility
{
    public static function Sum(...$args): int
    {
        return array_sum($args);
    }
}
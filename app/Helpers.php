<?php

namespace App;


class Helpers
{
    public function test()
    {
        echo "asdad";
    }

    public function thisIsMyCustomMethod()
    {
        echo self::class;
    }
}
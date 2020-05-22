<?php

namespace App\Http\Controllers;


class CustomController extends Controller
{
    public function thisIsMyCustomMethod()
    {
        echo self::class;
    }
}
<?php

namespace App\Http\Controllers\WEB;


use App\Helpers;
use App\Http\Controllers\Controller;

class FirstController extends Controller
{
    public function index(Helpers $helper)
    {
        $helper->thisIsMyCustomMethod();
        $helper->test();
        die("I will show you list of items");
    }

    public function store()
    {
        die("I will create entity with a given data");
    }

    public function update($id)
    {
        echo "I will update entity with ID $id";
    }

    public function show($id)
    {
        echo "I will show info about user with ID: $id";
    }

    public function create()
    {
        die("Rules for CREATE");
    }

    public function edit()
    {
        die("Rules for EDIT");
    }

    public function destroy($id)
    {
        die("I AM DESTROY $id");
    }

    public function test($f, $s)
    {
        echo "This is test $f $s";
    }
}
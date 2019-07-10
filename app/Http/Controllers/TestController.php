<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show($name)
    {
        return view('test', array('name' => $name));
    }
}

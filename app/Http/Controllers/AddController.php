<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddController extends Controller
{
    public function AddData()
    {
        $users = DB::select ('select us_id,us_name from user where us_status = ?', [1]);

        return view('form', ['users' => $users]);
    }

    public function show(Request $request)
    {
        print_r($request->input('name'));

        //return "show function";
    }
}

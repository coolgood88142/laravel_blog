<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SqlController extends Controller
{
    public function SelectData()
    {
        $users = DB::select ('select us_id,us_name from user where us_status = ?', [1]);

        return view('select', ['users' => $users]);
    }
}

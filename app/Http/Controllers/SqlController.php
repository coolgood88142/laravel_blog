<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SqlController extends Controller
{
    public function selectData()
    {
        $users = User::where('us_status', 1);

        return view('select', ['users' => $users]);
    }
}

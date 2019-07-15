<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddController extends Controller
{
    public function show()
    {
        $users = DB::select ('select us_id,us_name from user where us_status = ?', [1]);

        return view('form', ['users' => $users]);
    }

    public function AddData(Request $request)
    {
        $us_name = $request->input('name');
        $us_account = $request->input('account');
        $us_password = password_hash($request->input('password'), PASSWORD_DEFAULT);
        date_default_timezone_set('Asia/Taipei');
        $datetime = date ("Y-m-d H:i:s");

        $users = DB::insert('insert into user (us_account, us_password, us_name, us_gender, us_admin, us_status, us_email, us_last_login, us_headshot_path) values (?, ?, ?, ?, ?, ?, ?, ?, ?)',
             array($us_account, $us_password, $us_name, '', 'N', 1, '', $datetime, ''));

        return "新增成功";
    }
}

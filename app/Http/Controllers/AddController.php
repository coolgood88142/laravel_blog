<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AddController extends Controller
{
    public function show()
    {
        $users = User::where('us_status', 1);

        return view('form', ['users' => $users]);
    }

    public function addData(Request $request)
    {
        $us_name = $request->input('name');
        $us_account = $request->input('account');
        $us_password = Hash::make($request->input('password'));
        $datetime = Carbon::now();

        $users = User::insert(
            ['us_account' => $us_account, 'us_password' => $us_password, 'us_name' => $us_name,
            'us_gender' => '', 'us_admin' => 'N', 'us_status' => 1, 'us_email' => '',
            'us_last_login' => $datetime, 'us_headshot_path' => '']
        );
        
        return redirect('select');
    }
}

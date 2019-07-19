<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YahooController extends Controller
{
    public function SelectTilie()
    {
        $conn = DB::connection('mysql_yahoo');
        $titles = $conn->select ('select ti_category, ti_name, ti_text from title');

        return view('yahoo', ['titles' => $titles]);
    }
}

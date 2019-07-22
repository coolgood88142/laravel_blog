<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YahooController extends Controller
{
    public function SelectTilie()
    {
        $titles = Title::all();

        return view('yahoo', ['titles' => $titles]);
    }

    public function AddTilie(Request $request)
    {
        // 兩種都可以拿到資料，了解差在哪?
        // $ti_category = $request->ti_category;
        // $ti_category = $request->get('ti_category');
        $ti_category = $request->input('ti_category');
        $ti_name = $request->input('ti_name');
        $ti_text = $request->input('ti_text');

        $titles = Title::insert(
            ['ti_category' => $ti_category, 'ti_name' => $ti_name, 'ti_text' => $ti_text]
        );
        
        return redirect('yahoo');
    }

    public function Change(Request $request)
    {
        $data = $request->getContent(); 

        echo var_dump($data);
        exit;

    }


    public function DeleteTilie(Request $request)
    {
        $ti_id = $request->input('ti_id');
        $titles = Title::whereIn('ti_id', $ti_id)->delete();
        
        return redirect('yahoo');
    }

    public function UpdateTilie(Request $request)
    {
        $ti_id = $request->input('ti_id');
        $ti_category = $request->input('ti_category');
        $ti_name = $request->input('ti_name');
        $ti_text = $request->input('ti_text');
        $ti_no = $request->input('ti_no');

        

        // echo $ti_no;

        // $conn = DB::connection('mysql_yahoo');
        // $titles = $conn->table('title')->where('ti_id', $ti_id)
        // ->update(['ti_category' => $ti_category, 'ti_name' => $ti_name, 'ti_text' => $ti_text]);
        
        // return redirect('yahoo');
    }
}

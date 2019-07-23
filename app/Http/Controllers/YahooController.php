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

    public function DeleteTilie(Request $request)
    {
        $ti_id = $request->input('ti_id');
        $titles = Title::whereIn('ti_id', $ti_id)->delete();
        
        return redirect('yahoo');
    }

    public function GetUpdate(Request $request)
    {
        $ti_id = $request->input('ti_id');
        $ti_category = $request->input('ti_category');
        $ti_name = $request->input('ti_name');
        $ti_text = $request->input('ti_text');

        $categorys = ['焦點','運動','娛樂','FUN','生活','影音'];
        $ti_array = ['ti_id' => $ti_id, 'ti_category' => $ti_category, 'categorys' => $categorys, 'ti_name' => $ti_name, 'ti_text' => $ti_text];

        return view('update', $ti_array);
    }

    public function UpdateTitle(Request $request)
    {
        $ti_id = $request->input('ti_id');
        $ti_category = $request->input('ti_category');
        $ti_name = $request->input('ti_name');
        $ti_text = $request->input('ti_text');

        $titles = Title::where('ti_id', $ti_id)
        ->update(['ti_category' => $ti_category, 'ti_name' => $ti_name, 'ti_text' => $ti_text]);

        return redirect('yahoo');
    }
}

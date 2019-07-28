<?php

namespace App\Http\Controllers;

use App\Title;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class YahooController extends Controller
{
    public function SelectTilie()
    {
        $titles = Title::all();

        //帶變數action到blade
        //變數 = {{URL::to('/add')}}

        return view('yahoo', ['titles' => $titles]);
    }

    public function GetAdd(Request $request)
    {
        $categorys = ['焦點','運動','娛樂','FUN','生活','影音'];
        $action = route('add');

        $ti_array = ['ti_category' => '焦點', 'categorys' => $categorys, 'action' => $action];

        return view('add', $ti_array);
    }

    public function AddTilie(Request $request)
    {
        // 兩種都可以拿到資料，了解差在哪?
        // $ti_category = $request->ti_category;
        // $ti_category = $request->get('ti_category');
        $ti_category = $request->ti_category;
        $ti_name = $request->ti_name;
        $ti_text = $request->ti_text;
        $ti_date = Carbon::now()->toDateString(); 

        $titles = Title::insert(
            ['ti_date' => $ti_date, 'ti_category' => $ti_category, 'ti_name' => $ti_name, 'ti_text' => $ti_text]
        );
        
        return redirect('yahoo');
    }

    public function DeleteTilie(Request $request)
    {
        $ti_id = $request->ti_id;
        $titles = Title::whereIn('ti_id', $ti_id)->delete();
        
        return redirect('yahoo');
    }

    public function GetUpdate($id)
    {
        //function 名稱之後要改
        $titles = Title::whereIn('ti_id', [$id])->get();
        $categorys = ['焦點','運動','娛樂','FUN','生活','影音'];
        $action =  route('update');

        //組資料只跑1筆
        $ti_array = null;
        foreach ($titles as $title) {
            $ti_id = $title->ti_id;
            $ti_category = $title->ti_category;
            $ti_name = $title->ti_name;
            $ti_text = $title->ti_text;

            $ti_array = ['ti_id' => $ti_id, 'ti_category' => $ti_category, 'categorys' => $categorys, 'ti_name' => $ti_name, 'ti_text' => $ti_text, 'action' => $action];
        }
        
        return view('update', $ti_array);
    }

    public function UpdateTitle(Request $request)
    {
        $ti_id = $request->ti_id;
        $ti_category = $request->ti_category;
        $ti_name = $request->ti_name;
        $ti_text = $request->ti_text;

        $titles = Title::where('ti_id', $ti_id)
        ->update(['ti_category' => $ti_category, 'ti_name' => $ti_name, 'ti_text' => $ti_text]);

        return redirect('yahoo');
    }
}

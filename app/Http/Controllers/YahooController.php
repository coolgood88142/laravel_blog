<?php

namespace App\Http\Controllers;

use App\Titles;
use App\Categorys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class YahooController extends Controller
{
    public function SelectTilie()
    {
        $titles = Titles::join('categorys', 'titles.category_id', '=', 'categorys.id')
        ->select('titles.id', 'categorys.name as category', 'titles.name', 'titles.text')->get();

        return view('yahoo', ['titles' => $titles]);
    }

    public function GetAdd(Request $request)
    {
        $categorys_table = Categorys::all();
        $categorys = array();$i=0;
        foreach($categorys_table as $category){
            $categorys [$i]["id"]= $category->id;
            $categorys [$i]["name"]= $category->name;
            $i++;
        }

        $title = '新增標題資料';
        $action = route('add');

        $ti_array = ['title' => $title, 'ti_category' => '1', 'categorys' => $categorys, 'action' => $action];

        return view('edit', $ti_array);
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

        $title = new Titles();
        $title->date = $ti_date;
        $title->category_id = $ti_category;
        $title->name = $ti_name;
        $title->text = $ti_text;

        $title->save();
        return redirect('yahoo');
    }

    public function DeleteTilie(Request $request)
    {
        $ti_id = $request->ti_id;
        $titles = Titles::whereIn('id', $ti_id)->delete();
        
        return redirect('yahoo');
    }

    public function GetUpdate($id)
    {
        //function 名稱之後要改
        $titles = Titles::join('categorys', 'titles.category_id', '=', 'categorys.id')
        ->select('titles.category_id', 'titles.name', 'titles.text')
        ->whereIn('titles.id', [$id])->get();
        $title = '更新標題資料';
        $action =  route('update');

        $categorys_table = Categorys::all();
        $categorys = array();$i=0;
        foreach($categorys_table as $category){
            $categorys [$i]["id"]= $category->id;
            $categorys [$i]["name"]= $category->name;
            $i++;
        }

        //組資料只跑1筆
        $ti_array = null;
        foreach ($titles as $data) {
            $ti_id = $id;
            $ti_category = $data->category_id;
            $ti_name = $data->name;
            $ti_text = $data->text;;

            $ti_array = ['title' => $title, 'ti_id' => $ti_id, 'ti_category' => $ti_category, 'categorys' => $categorys, 'ti_name' => $ti_name, 'ti_text' => $ti_text, 'action' => $action];
        }
        return view('edit', $ti_array);
    }

    public function UpdateTitle(Request $request)
    {
        $ti_id = $request->ti_id;
        $ti_category = $request->ti_category;
        $ti_name = $request->ti_name;
        $ti_text = $request->ti_text;
        try{
            $title= Titles::where('id', $ti_id)->first();
            $title->category_id = $ti_category;
            $title->name = $ti_name;
            $title->text = $ti_text;
            $title->save(); 
        }catch(\Exception $e) {
            dd($e);
        }
        return redirect('yahoo');
    }
}

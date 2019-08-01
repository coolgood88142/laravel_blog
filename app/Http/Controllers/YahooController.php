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

        $action = route('add');

        $ti_array = ['ti_category' => '1', 'categorys' => $categorys, 'action' => $action];

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

        $title = new Titles();
        $title->date = $ti_date;
        $title->category_id = $ti_category;
        $title->name = $ti_name;
        $title->text = $ti_text;

        $title->save();

        // $titles = Title::insert(
        //     ['ti_date' => $ti_date, 'ti_category' => $ti_category, 'ti_name' => $ti_name, 'ti_text' => $ti_text]
        // );
        
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
        ->select('titles.id', 'titles.date', 'categorys.name as category', 'titles.name', 'titles.text')
        ->whereIn('titles.id', [$id])->get();
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
        foreach ($titles as $title) {
            $ti_id = $title->id;
            $ti_date = $title->date;
            $ti_category = $title->category_id;
            $ti_name = $title->name;
            $ti_text = $title->text;

            $ti_array = ['ti_id' => $ti_id, 'ti_date' => $ti_date,'ti_category' => $ti_category, 'categorys' => $categorys, 'ti_name' => $ti_name, 'ti_text' => $ti_text, 'action' => $action];
        }
        
        return view('update', $ti_array);
    }

    public function UpdateTitle(Request $request)
    {
        $ti_id = $request->ti_id;
        $ti_date = $request->ti_date;
        $ti_category = $request->ti_category;
        $ti_name = $request->ti_name;
        $ti_text = $request->ti_text;

        try{
            $title= Titles::where('id', $ti_id)->first();
            $title->date = $ti_date;
            $title->category_id = $ti_category;
            $title->name = $ti_name;
            $title->text = $ti_text;
            $title->save(); 
        }catch(\Exception $e) {
            dd($e);
        }
        


        // $titles = Title::where('ti_id', $ti_id)
        // ->update(['ti_category' => $ti_category, 'ti_name' => $ti_name, 'ti_text' => $ti_text]);

        return redirect('yahoo');
    }
}

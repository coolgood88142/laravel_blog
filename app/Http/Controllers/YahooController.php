<?php

namespace App\Http\Controllers;

use App\Repositories\TitlesRepository;
use App\Repositories\CategorysRepository;
use Illuminate\Http\Request;

class YahooController extends Controller
{
    protected $titlesRepo;
    protected $categorysRepo;

    public function __construct(TitlesRepository $titlesRepo, CategorysRepository $categorysRepo)
    {
        $this->titlesRepo = $titlesRepo;
        $this->categorysRepo = $categorysRepo;
    }

    public function selectTilie()
    {
        $titles = $this->titlesRepo->getTitlesAllData();

        return view('yahoo', ['titles' => $titles]);
    }

    public function getAdd(Request $request)
    {
        $categorys_table = $this->categorysRepo->getCategorysAllData();
        $categorys = array();$i=0;
        foreach ($categorys_table as $category) {
            $categorys [$i]["id"]= $category->id;
            $categorys [$i]["name"]= $category->name;
            $i++;
        }

        $title = '新增標題資料';
        $action = route('add');

        $ti_array = ['title' => $title, 'ti_category' => '1', 'categorys' => $categorys, 'action' => $action];

        return view('edit', $ti_array);
    }

    public function addTilie(Request $request)
    {
        $ti_category = $request->ti_category;
        $ti_name = $request->ti_name;
        $ti_text = $request->ti_text;
        $this->titlesRepo->save($ti_category, $ti_name, $ti_text);

        return redirect('yahoo');
    }

    public function deleteTilie(Request $request)
    {
        $ti_id = $request->ti_id;
        $this->titlesRepo->delete($ti_id);
        
        return redirect('yahoo');
    }

    public function getUpdate($id)
    {

        $titles = $this->titlesRepo->getTitlesCategoryData($id);
        $title = '更新標題資料';
        $action =  route('update');

        $categorys_table = $this->categorysRepo->getCategorysAllData();
        $categorys = array();$i=0;
        foreach ($categorys_table as $category) {
            $categorys [$i]["id"]= $category->id;
            $categorys [$i]["name"]= $category->name;
            $i++;
        }

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

    public function updateTitle(Request $request)
    {
        $ti_id = $request->ti_id;
        $ti_category = $request->ti_category;
        $ti_name = $request->ti_name;
        $ti_text = $request->ti_text;
        try {
            $title = $this->titlesRepo->getFirstTitlesData($ti_id);
            $title->category_id = $ti_category;
            $title->name = $ti_name;
            $title->text = $ti_text;
            $title->save(); 
        } catch (Exception $e) {
            dd($e);
        }
        return redirect('yahoo');
    }
}

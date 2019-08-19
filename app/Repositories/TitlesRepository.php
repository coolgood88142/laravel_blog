<?php

namespace App\Repositories;

use App\Models\Titles;
use Carbon\Carbon;

class TitlesRepository
{
    public function save($category_id, $name, $text)
    {
        $titles = new Titles(); 
        $today = Carbon::now()->toDateString();
        $titles->date = $today;
        $titles->category_id = $category_id; 
        $titles->name = $name;
        $titles->text = $text;
        $titles->save();
    }

    public function delete($ti_id){
        $titles = Titles::where('id', $ti_id)->delete();
    }

    public function getTitlesAllData()
    {
        $titles = Titles::with('categorys')->get();
        return $titles;
    }

    public function getFirstTitlesData($id)
    {
        $titles = Titles::where('id', $id)->first();
        return $titles;
    }

    public function getTitlesCategoryData($id)
    {   
        $titles = Titles::with('categorys')->where('titles.id', $id)->get();
        return $titles;
    }

    public function getToDayData()
    {
        $today = Carbon::now()->toDateString();
        $today_data = Titles::where('date', $today)->get();
        return $today_data;
    }
}

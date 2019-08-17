<?php

namespace App\Repositories;

use App\Models\Titles;
use Carbon\Carbon;

class TitlesRepository
{
    protected $titles;
    protected $today;

    public function __construct(Titles $titles)
    {
        $this->titles = $titles;
        $today = Carbon::now()->toDateString();
    }

    public function save($category_id, $name, $text)
    {
        $titles = $this->titles; 
        $titles->date = $today;
        $titles->category_id = $category_id; 
        $titles->name = $name;
        $titles->text = $text;
        $titles->save();

    }

    public function getToDayData()
    {
        
        $today_data = $this->titles->where('date', $today)->get();
        return $today_data;
    }
}

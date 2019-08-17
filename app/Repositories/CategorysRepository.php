<?php

namespace App\Repositories;

use App\Models\Categorys;

class CategorysRepository
{
    protected $categorys;

    public function __construct(Categorys $categorys)
    {
        $this->categorys = $categorys;
    }

    public function save($id, $name)
    {
        $category = $this->categorys;
        $category->id = $id;
        $category->name = $name;
        $category->status = 'Y';
        $category->save();

    }

    public function getToNormalCategory()
    {
        $data= $this->categorys->where('status', 'Y')->get();
        return $data;
    }

    public function getMaxId()
    {
        $max= $this->categorys->all()->max('id');
        return $max;
    }
}

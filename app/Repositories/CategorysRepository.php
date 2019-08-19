<?php

namespace App\Repositories;

use App\Models\Categorys;
use Illuminate\Database\Eloquent\Collection;

class CategorysRepository
{
    public function save($id, $name)
    {
        $category = new Categorys();
        $category->id = $id;
        $category->name = $name;
        $category->status = 'Y';
        $category->save();
    }

    public function getCategorysAllData()
    {
        $categorys = Categorys::all();
        return $categorys;
    }

    public function getToNormalCategory()
    {
        $data= Categorys::where('status', 'Y')->get();
        return $data;
    }

    public function getMaxId()
    {
        $max= Categorys::all()->max('id');
        return $max;
    }

    public function getMatchCategoryData(Collection $categorys_table, Array $new_categorys)
    {
        $categorys_array = array();
        $i = 0;
        foreach ($categorys_table as $category) {
            $name = $category->name;
            if ($name != $new_categorys[$i]) {
                $max = $this->getMaxId();
                $max = $max + 1;
                $new_category = $new_categorys[$i];

                $this->save($max, $new_category);
                $categorys_array[$i]["id"] = $max;
                $categorys_array[$i]["name"] = $new_category;
            } else {
                $categorys_array[$i]["id"] = $i;
                $categorys_array[$i]["name"] = $name;
            }
            $i++;
        }

        return $categorys_array;
    }
}

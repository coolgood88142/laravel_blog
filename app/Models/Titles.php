<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Titles extends Model
{
    protected $table = 'titles';
    protected $connection = 'mysql_yahoo';
    public $timestamps = false;

    public function categorys()
    {
        return $this->belongsTo('App\Models\Categorys','category_id', 'id');
    }
}

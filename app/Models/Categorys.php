<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    protected $table = 'categorys';
    protected $connection = 'mysql_yahoo';
    public $timestamps = false;

    public function titles()
    {
        return $this->belongsToMany('App\Models\Titles');
    }
}

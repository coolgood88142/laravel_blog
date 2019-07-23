<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $connection = 'mysql_yahoo';
    public $timestamps = false;
}

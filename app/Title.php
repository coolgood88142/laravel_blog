<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titles extends Model
{
    protected $table = 'titles';
    protected $connection = 'mysql_yahoo';
    public $timestamps = false;
}

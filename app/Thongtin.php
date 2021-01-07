<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thongtin extends Model
{
    protected $table = "thongtin";

    public function thongtin(){
        return $this->hasMany('App\User','id_thongtin','id');
    }
}

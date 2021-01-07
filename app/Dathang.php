<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dathang extends Model
{
    protected $table = "dathang";

    public function dathang(){
        return $this->hasMany('App\User','id_dathang','id');
    }
}

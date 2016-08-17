<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hmo extends Model
{
    //
    protected $table = 'hmos';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsToMany('App\User', 'hmos_users');
    }
}

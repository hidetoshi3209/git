<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = "likes";
    public function like() {
        return $this->belongsTo('App\User');
        return $this->belongsTo('App\Product');
    }

    public function asr($user_id,$product_id) {
        return like::where('user_id',$user_id)->where('product_id',$product_id)->exists();
    }
}

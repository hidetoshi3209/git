<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['image','title','price','comment','condition'];

    public function buy() {
        return $this->hasOne('App\Buy');
    }

    public function like() {
        return $this->hasMany('App\Like');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}

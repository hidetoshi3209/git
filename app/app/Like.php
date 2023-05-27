<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function product() {
        return $this->hasOne('App\Product', 'product_id', 'id');
    }
}

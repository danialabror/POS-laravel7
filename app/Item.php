<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->hasOne('App\Category','id','id_category');
    }
}

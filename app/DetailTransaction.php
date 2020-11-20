<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $guarded = [];
    public function item()
    {
        return $this->hasOne('App\Item','id','id_item');
    }
}

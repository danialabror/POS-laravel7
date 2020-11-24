<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    protected $table = 'things';

    protected $fillable = ['name', 'merk_id', 'distributor_id', 'entry', 'price', 'stock'];
}

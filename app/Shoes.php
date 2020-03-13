<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoes extends Model
{
    protected $fillable = [
    	'name', 'price', 'size'
    ];
}

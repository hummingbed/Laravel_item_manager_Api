<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    protected $guarder = [];
    
    protected $fillable = ['text', 'body'];
}

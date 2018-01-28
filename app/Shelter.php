<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    protected $fillable = ['approve', 'nameselter', 'address', 'phone', 'description'];
    
}

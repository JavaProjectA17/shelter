<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    protected $fillable = ['approve', 'nameshelter', 'address', 'phone', 'description'];
    
}

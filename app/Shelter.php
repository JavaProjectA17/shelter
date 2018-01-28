<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    protected $fillable = ['id', 'approve', 'name_shelter', 'address', 'description', 'phone'];
    

}

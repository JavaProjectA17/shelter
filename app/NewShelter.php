<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewShelter extends Model
{
   protected $fillable = ['title', 'address', 'phone', 'description'];

}

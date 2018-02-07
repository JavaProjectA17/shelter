<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Novelty extends Model
{
    protected $fillable = ['title', 'image', 'short_description', 'description', 'start'];
}

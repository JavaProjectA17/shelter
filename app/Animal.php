<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['pet_name', 'pet_image', 'about','category_id','shelter_id','birth_date'];

    public function category()
    {
        return $this->belongsTo('App\AnimalCategory');
    }
}

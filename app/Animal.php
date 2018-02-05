<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['name', 'image', 'about','category_id','shelter_id','birth_date'];

    public static function add($values){
        $user = new static;
        $user = fill($values);
        $user->save();

        return $user;
    }

    public function uploadImage($image){
        if ($image != null){
            $image = $request->file('image');
            $image->move('imageAnimals',$image->getClientOriginalName());
        }
    }

    public function category()
    {
        return $this->belongsTo('App\AnimalCategory');
    }
    public function shelter()
    {
        return $this->belongsTo('App\Shelter');
    }
    public function categoryName(){
        return $this->category->title;
    }

    public function shelterName()
    {
        return $this->shelter->nameshelter;
    }
}


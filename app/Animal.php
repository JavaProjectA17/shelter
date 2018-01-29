<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['name', 'image', 'about','category_id','shelter_id','birth_date'];

//    public function categoryName()
//    {
//        $id = $this->category_id;
//        return \App\AnimalCategory::where('id',$id)->value('title');
//    }
//    public function shelter()
//    {
//        $id = $this->shelter_id;
//        return \App\Shelter::where('id',$id)->value('name_shelter');
//    }

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
        return $this->shelter->name_shelter;
    }
}


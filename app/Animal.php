<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['name', 'image', 'about','category_id','shelter_id','birth_date'];

    public function categoryName()
    {
        $id = $this->category_id;
//        return \App\AnimalCategory::all()->where('id',$id)->value('title');
        return DB::table('animal_categories')->where('id',$id)->value('title');
    }
    public function shelterName()
    {
        $id = $this->shelter_id;
//        return \App\Shelter::all()->where('id',$id);
        return DB::table('shelters')->where('id',$id)->value('name_shelter');
    }
}

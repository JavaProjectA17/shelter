<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Animal extends Model
{
    protected $fillable = ['name', 'about','category_id','shelter_id','birth_date'];

    public static function add($values){
        $animal = new static;
        $animal->fill($values);
        $animal->save();

        return $animal;
    }

    public function uploadImage($image){
        if ($image != null){

            $imageName = time().$this->id.'.'.$image->extension();

            $image->move('imageAnimals',$imageName);
            $this->image = $imageName;
            $this->save();
        }
    }

    public function deleteImage(){
        if ($this->image != null)
            if (File::exists('imageAnimals/'.$this->image))
                File::delete('imageAnimals/'.$this->image);
    }

    public function remove(){
        $this->deleteImage();
        $this->delete();
    }

    public function getAvatar(){
        if ($this->image == null){
            return 0;
        }
        return '/imageAnimals/'.$this->image;
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


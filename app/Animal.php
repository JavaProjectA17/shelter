<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Animal extends Model
{
    protected $fillable = ['name', 'about','category_id','shelter_id','birth_date'];
    const PATHTOIMAGE = 'uploads/images/animals/';

    public function uploadImage($image){
        if ($image != null){
            $fullPathToImage = self::PATHTOIMAGE.$this->id;
            $imageName = time().$this->id.'.'.$image->extension();

            if (File :: makeDirectory ( $fullPathToImage )){
                $image->move($fullPathToImage,$imageName);
                $this->image = $imageName;
                $this->save();
            }
            else return false;
        }
    }

    public function deleteImage(){
        if ($this->image != null) {
            $fullPathToImage = self::PATHTOIMAGE.$this->id;

            if (File::isDirectory($fullPathToImage)){
                if(File::exists($fullPathToImage.'/'.$this->image)){
                    File::delete($fullPathToImage.'/'.$this->image);
                    File::deleteDirectory($fullPathToImage);
                    $this->image = null;

            }
                else return false;
            }
            else return false;
        }
    }


    public function getAvatar(){
        $fullPathToImage = '/'.self::PATHTOIMAGE.$this->id.'/';
        $fullPathTodefaultImage = '/'.self::PATHTOIMAGE.'default/defaultImage.jpeg';

        if ($this->image == null){
            return $fullPathTodefaultImage;
        }
        return $fullPathToImage.$this->image;

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


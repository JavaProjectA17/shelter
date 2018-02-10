<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Novelty extends Model
{
    protected $fillable = ['title', 'short_description', 'description', 'start'];


    const PATHTOIMAGE = 'uploads/images/news/';

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
            $fullPathToImage = $this->pathToImage.$this->id;
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

    public function getImage(){
        $fullPathToImage = '/'.self::PATHTOIMAGE.$this->id.'/';
        $fullPathTodefaultImage = '/'.self::PATHTOIMAGE.'default/defaultImage.jpg';
        if ($this->image == null){
            return $fullPathTodefaultImage;
        }
        return $fullPathToImage.$this->image;
    }

}

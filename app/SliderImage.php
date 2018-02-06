<?php

namespace App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    protected $fillable = ['image'];

    public  function uploadImage($image){
        if($image == null) {
            return;
        }
            $this->removeImage();
            $filename = str_random(10) . '.' . $image->extension();
            $image->storeAs('uploads', $filename);
            $this->imageSlider = $filename;
            $this->save();
    }


    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if($this->imageSlider != null)
        {
            Storage::delete('uploads/' . $this->imageSlider);
        }
    }

    public function getImage()
    {
        if ($this->imageSlider == null) {
            return '/uploads/user2-160x160.jpg';
        }
        return "/uploads/" . $this->imageSlider;
    }

}

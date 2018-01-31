<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    protected $fillable = ['nameshelter', 'address', 'description', 'phone'];
    
    public static function add($values, $id) {
        $shelter = new static();
        $shelter->fill($values);
        $shelter->user_id = $id;
        $shelter->save();

        return $shelter;
    }

}

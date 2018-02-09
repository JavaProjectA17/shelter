<?php

namespace App;

use App\Mail\MailClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function send_form(){
        $shelter = $this;
        $user = $this->user;
        Mail::to($user->email)->send(new MailClass($user->name, $shelter->nameshelter));
    }
    public function animals()
    {
        return $this->hasMany('App\Animal');
    }


}

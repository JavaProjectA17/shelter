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
    public static function send_form($id){
        $user = DB::table('shelters')->where('id', $id)->first();
        $email = DB::table('users')->where('id', $user->user_id)->first();
        
        Mail::to('rizhko.anastasiya@gmail.com')->send(new MailClass($user->nameshelter, $email->email));
    }

}

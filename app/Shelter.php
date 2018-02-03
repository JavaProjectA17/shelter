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
        $shelter = DB::table('shelters')->where('id', $id)->first();
        $user = DB::table('users')->where('id', $shelter ->user_id)->first();

        Mail::to($user->email)->send(new MailClass($user->name, $shelter->nameshelter));
    }

}

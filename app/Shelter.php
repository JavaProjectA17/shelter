<?php

namespace App;

use App\Mail\MailClass;
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
    public static function send_form($request){
        
        $user = User::findOrFail($id);
        dd($user);
//        $name = $request->name;
//        $email = $request->email;
//
//        Mail::to('rizhko.anastasiya@gmail.com')->send(new MailClass($name, $email));
        return redirect()->route('admin.shelters.waiting_to_approve');
    }

}

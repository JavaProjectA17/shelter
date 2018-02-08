<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ChangePassword extends Model
{
    protected $fillable = ['old_password', 'new_password', 'confirm_new_password'];

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
            'confirm_new_password' => 'required|string|min:6',
        ]);
    }
 
}

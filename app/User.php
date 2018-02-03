<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    public function hasRole($role) {
        $this->role == $role;
    }

    public static function add($values) {
        $user = new static();
        $user->fill($values);
        $user->password = bcrypt($values['password']);
        $user->save();

        return $user;
    }

    public function bcryptPassword($password) {
        if ($password != null) {
            $this->password = bcrypt($password); // TODO
//            return bcrypt($password);
        }
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

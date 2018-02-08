<?php

namespace App\Http\Controllers\Employee;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function index() 
    {
        return view('employee.change_password');
    }
    
    public function edit(Request $request){

        if (Auth::attempt(array('id' => Auth::id(), 'password' => $request->old_password))) {
            if ($request->new_password == $request->confirm_new_password ){
                $user = Auth::user();
                $user->password = bcrypt($request->new_password);
                $user->save();
                return redirect()->back()->with('status', 'Password has been successfully changed!');
            }
            return redirect()->back()->with('status', 'wrong old confirm_new_password!');
        }else{
            return redirect()->back()->with('status', 'wrong old password!');
        }

    }

}

<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChangePassword;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function index() 
    {
        return view('employee.change_password');
    }
    
    public function edit(Request $request){

        if (Auth::attempt(array('id' => Auth::id(), 'password' => $request->old_password))) {
            dd('update');
        }else{
            return redirect()->back()->with('status', 'Password has been successfully changed!');
        }

//        $oldpass = bcrypt($request->old_password);
//        if(Auth::user()->password == $oldpass){
//            return redirect()->back()->with('status', 'Password has been successfully changed!');
//        }
      //  dd(Auth::user()->password, $oldpass);
        //ChangePassword::create($request->all());

    }
}

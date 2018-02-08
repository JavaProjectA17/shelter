<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{
    public function index() 
    {
        return view('employee.change_password');
    }
    
    public function edit()
    {
        return view('employee.change_password');
    }
}

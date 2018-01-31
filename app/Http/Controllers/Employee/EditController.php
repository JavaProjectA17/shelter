<?php
/**
 * Created by PhpStorm.
 * User: yanki
 * Date: 23.01.18
 * Time: 18:16
 */

namespace App\Http\Controllers\Employee;


use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function index(){
        return view('Employee/edit');
    }
}
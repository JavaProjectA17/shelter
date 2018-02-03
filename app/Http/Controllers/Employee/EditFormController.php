<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditFormController extends Controller
{
   public function index(){
      return view ('employee.newshelter.index',compact('edit'));
   }

   public function store(Request $request){
      print_r($_POST);
   }
}

<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditFormController extends Controller
{
    protected $request;

    public function __constructor(Request $request){
        $this->request = $request;
 }
   public function index(){
      return view ('employee.newshelter.index',compact('edit'));
   }

   public function show(Request $request){

        $request->flash();
//        return $this->index();
   }

    public function store(Request $request){
        $request->all();
        echo '<h1>'.$request->input('').'</h1>';
    }
}

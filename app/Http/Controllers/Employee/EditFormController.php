<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shelter as NewShelter;
class EditFormController extends Controller
{
    protected $request;

    public function __constructor(Request $request){
        $this->request = $request;
    }
    public function index(Request $request)
    {
        return view ('employee.newshelter.index',compact('edit'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $new_shelter = new NewShelter();
        $new_shelter->fill($request->all());
        $new_shelter->save();
        if($request->isMethod('post')){
            $request->flash();
            return view('employee.newshelter.index',compact('edit'));
        }
    }

    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

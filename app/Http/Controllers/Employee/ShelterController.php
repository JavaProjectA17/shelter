<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shelter;
use Illuminate\Support\Facades\Auth;

class ShelterController extends Controller
{

    public function index(){
        $shelters = Shelter::all();
        $shelter = $shelters->where('user_id', Auth::id())->first();
        if (is_null($shelter)){
            return redirect('index');
        }if($shelter->approve == 0){
            return redirect('add_new_shelter')->with('status', 'Your application is being processed. Manager will contact you as soon as possible!');
        }else{
            return view('employee.index')
                ->with([
                    'nameshelter' =>  $shelter->nameshelter,
                    'address' =>  $shelter->address,
                    'phone' =>  $shelter->phone,
                    'description' =>  $shelter->description,
                ]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Shelter::add($request->all(), Auth::id());
        return redirect('add_new_shelter')->with('status', 'Thank you for your appeal. In the near future, the admin has to process it!');
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
    public function change_password() //Request $request, $id
    {
        return view('employee.change_password');
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

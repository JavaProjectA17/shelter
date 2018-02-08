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
            return redirect()->back();
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
        return redirect()->back()->with('status', 'Thank you for your appeal. In the near future, the admin has to process it!');
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
    
}

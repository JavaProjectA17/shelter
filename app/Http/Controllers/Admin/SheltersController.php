<?php

namespace App\Http\Controllers\Admin;

use App\Shelter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SheltersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'all';
        $shelter = Shelter::paginate(10);
        return view('admin.shelters.index', compact("shelter", "active"));
    }

    public function approved() {
        $active = 'approved';
        $shelter = Shelter::where('approve', '=', true)->paginate(10);
        return view('admin.shelters.index', compact("shelter", "active"));
    }

    public function waiting_to_approve() {
        $active = 'waiting';
        $shelter = Shelter::where('approve', '=', false)->paginate(10);
        return view('admin.shelters.index', compact("shelter", "active"));
    }

    public function toggleActive(Request $request, $id) {
        $shelter = Shelter::findOrFail($id);
        $shelter->approve = !$shelter->approve;
        $shelter->save();
        $shelter->update($request->all());

        if($shelter->approve) {
            $shelter->sendForm();
            return redirect()->route('admin.shelters.waiting_to_approve');
        }
        else
            return redirect()->route('admin.shelters.approved');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

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
//        $active = 'all';
        $queries = null;

        $shelters = new Shelter();

        if (request()->has('sortByName')) {
            $shelters = $shelters->orderBy('nameshelter', request('sortByName'));
            $queries = request('sortByName');
        } else if (request()->has('sortByUserId')) {
            $shelters = $shelters->orderBy('user_id', request('sortByUserId'));
            $queries = request('sortByUserId');
        } else if (request()->has('sortByApprove')) {
            $shelters = $shelters->orderBy('approve', request('sortByApprove'));
            $queries = request('sortByApprove');
        } else {
            $shelters = $shelters->orderBy('approve', 'asc', request('sortByApprove'));
            $queries = request('sortByApprove');
        }

        $shelters = $shelters->paginate(10)->appends($queries);
//        $shelters = Shelter::paginate(10);
        return view('admin.shelters.index', compact("shelters"));//, "active"));
    }

//    public function approved() {
//        $active = 'approved';
//        $shelters = Shelter::where('approve', '=', true)->paginate(10);
//        return view('admin.shelters.index', compact("shelters", "active"));
//    }
//
//    public function waiting_to_approve() {
//        $active = 'waiting';
//        $shelters = Shelter::where('approve', '=', false)->paginate(10);
//        return view('admin.shelters.index', compact("shelters", "active"));
//    }

    public function toggleActive(Request $request, $id) {
        $shelter = Shelter::findOrFail($id);
        $shelter->approve = !$shelter->approve;
        $shelter->save();
        $shelter->update($request->all());

        if($shelter->approve) {
            $shelter->send_form();
            return redirect()->route('admin.shelters.index');
        }
        else
            return redirect()->route('admin.shelters.index');
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

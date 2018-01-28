<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreKindsRequest;
use App\Kind;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KindsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kinds = Kind::paginate(5);
        return view('admin.kinds.index', compact('kinds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kinds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKindsRequest $request)
    {
        Kind::create($request->all());
        return redirect()->route('admin.kinds.index')->with(['message' => 'Kind added successfully']);
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
        $kinds = Kind::findOrFail($id);
        return view('admin.kinds.edit', compact('kinds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreKindsRequest $request, $id)
    {
        $kinds = Kind::findOrFail($id);
        $kinds->update($request->all());
        return redirect()->route('admin.kinds.index')->with(['message' => 'Kind updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kinds = Kind::findOrFail($id);
        $kinds->delete();
        return redirect()->route('admin.kinds.index')->with(['message' => 'Kind deleted successfully']);
    }
}

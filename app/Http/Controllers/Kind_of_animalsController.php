<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKind_of_animalsRequest;
use App\Kind_of_animal;
use Illuminate\Http\Request;

class Kind_of_animalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kind_of_animals = Kind_of_animal::paginate(5);//all();
        return view('kind_of_animals.index', compact('kind_of_animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kind_of_animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKind_of_animalsRequest $request)
    {
        Kind_of_animal::create($request->all());
        return redirect()->route('kind_of_animals.index')->with(['message' => 'Kind added successfully']);
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
        $kind_of_animal = Kind_of_animal::findOrFail($id);
        return view('kind_of_animals.edit', compact('kind_of_animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreKind_of_animalsRequest $request, $id)
    {
        $kind_of_animal = Kind_of_animal::findOrFail($id);
        $kind_of_animal->update($request->all());
        return redirect()->route('kind_of_animals.index')->with(['message' => 'Kind updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kind_of_animal = Kind_of_animal::findOrFail($id);
        $kind_of_animal->delete();
        return redirect()->route('kind_of_animals.index')->with(['message' => 'Kind deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Animal;
use App\Http\Requests\StoreAnimalRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::paginate(5);
        return view('admin.animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnimalRequest $request)
    {
        Animal::create($request->all());
        return redirect()->route('admin.animals.index')->with(['message' => 'Pet added successfully']);
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
        $animals = Animal::findOrFail($id);
        return view('admin.animals.edit', compact('animals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAnimalRequest $request, $id)
    {
        $animals = Animal::findOrFail($id);
        $animals->update($request->all());
        return redirect()->route('admin.animals.index')->with(['message' => 'Pet updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animals = Animal::findOrFail($id);
        $animals->delete();
        return redirect()->route('admin.animals.index')->with(['message' => 'Pet deleted successfully']);
    }
}

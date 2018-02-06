<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Animal;
use App\Http\Requests\StoreAnimalRequest;
use App\AnimalCategory;
use App\Shelter;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::paginate(5);//all()
        return view('employee.animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = AnimalCategory::all();
        $shelters = Shelter::all();
        return view('employee.animals.create',compact('categories','shelters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnimalRequest $request)
    {
        $animal = Animal::add($request->all());
        $animal->uploadImage($request->file('image'));
        return redirect()->route('employee.animals.index')->with(['message' => 'Pet added successfully']);
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
        $animal = Animal::findOrFail($id);
        $categories = AnimalCategory::all();
        $shelters = Shelter::all();
        return view('employee.animals.edit', compact('animal','categories','shelters'));
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

        $animal = Animal::findOrFail($id);
        $animal->deleteImage();
        $animal->uploadImage($request->file('image'));
        $animal->update($request->all());

        return redirect()->route('employee.animals.index')->with(['message' => 'Pet updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->remove();
        return redirect()->route('employee.animals.index')->with(['message' => 'Pet deleted successfully']);
    }
}

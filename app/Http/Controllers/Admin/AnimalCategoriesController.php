<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreAnimalCategoriesRequest;
use App\AnimalCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnimalCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animalcategorys = AnimalCategory::paginate(5);
        return view('admin.animalcategorys.index', compact('animalcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.animalcategorys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnimalCategoriesRequest $request)
    {
        AnimalCategory::create($request->all());
        return redirect()->route('admin.animalcategorys.index')->with(['message' => 'Category added successfully']);
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
        $animalcategorys = AnimalCategory::findOrFail($id);
        return view('admin.animalcategorys.edit', compact('animalcategorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAnimalCategoriesRequest $request, $id)
    {
        $animalcategorys = AnimalCategory::findOrFail($id);
        $animalcategorys->update($request->all());
        return redirect()->route('admin.animalcategorys.index')->with(['message' => 'Kind updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animalcategorys = AnimalCategory::findOrFail($id);
        $animalcategorys->delete();
        return redirect()->route('admin.animalcategorys.index')->with(['message' => 'Kind deleted successfully']);
    }
}
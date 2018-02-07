<?php

namespace App\Http\Controllers\Admin;

use App\Animal;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Controllers\Controller;

class AnimalsController extends Controller
{
    public function index()
    {
        $animals = Animal::paginate(5);
//        dd($animals);
        return view('admin.animals.index', compact('animals'));
    }

    public function create()
    {
        $this->authorize('create', Animal::class);
        return view('admin.animals.create');
    }

    public function store(StoreAnimalRequest $request)
    {
        $this->authorize('create', Animal::class);
//        $t = $request->get('image');
//        if ($request->get('image') == null) {
//            $request->set('image') = "/admin/images/default_img.jpg";
//        }
        Animal::create($request->all());
        return redirect()->route('admin.animals.index')->with(['message' => 'Pet added successfully']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize('update', Animal::class);
        $animals = Animal::findOrFail($id);
        return view('admin.animals.edit', compact('animals'));
    }

    public function update(StoreAnimalRequest $request, $id)
    {
        $this->authorize('update', Animal::class);
        $animals = Animal::findOrFail($id);
        $animals->update($request->all());
        return redirect()->route('admin.animals.index')->with(['message' => 'Pet updated successfully']);
    }

    public function destroy($id)
    {
        $this->authorize('delete', Animal::class);
        $animals = Animal::findOrFail($id);
        $animals->delete();
        return redirect()->route('admin.animals.index')->with(['message' => 'Pet deleted successfully']);
    }
}

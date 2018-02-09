<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Animal;
use App\Http\Requests\StoreAnimalRequest;
use App\AnimalCategory;
use App\Shelter;
use Illuminate\Support\Facades\Auth;


class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shelters = Shelter::all();
        $shelter = $shelters->where('user_id', Auth::id())->first();
//        dd($shelter->animals());
        if (is_null($shelter)){
            return redirect()->back();
        }
        if($shelter->approve == 0){
            return redirect('add_new_shelter')->with('status', 'Your application is being processed. Manager will contact you as soon as possible!');
        }
        else {
            $animals = Animal::paginate();
            return view('employee.animals.index', compact('animals'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shelters = Shelter::all();
        $shelter = $shelters->where('user_id', Auth::id())->first();

        if (is_null($shelter)){
            return redirect()->back();
        }
        if($shelter->approve == 0){
            return redirect('add_new_shelter')->with('status', 'Your application is being processed. Manager will contact you as soon as possible!');
        }
        else {
            $categories = AnimalCategory::all();
            return view('employee.animals.create',compact('categories','shelter'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnimalRequest $request)
    {
        $shelters = Shelter::all();
        $shelter = $shelters->where('user_id', Auth::id())->first();

        if (is_null($shelter)){
            return redirect()->back();
        }
        if($shelter->approve == 0){
            return redirect('add_new_shelter')->with('status', 'Your application is being processed. Manager will contact you as soon as possible!');
        }
        else {
            $animal = Animal::create($request->all());
            $animal->uploadImage($request->file('image'));
            return redirect()->route('employee.animals.index')->with(['message' => 'Pet added successfully']);
        }
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
        $shelters = Shelter::all();
        $shelter = $shelters->where('user_id', Auth::id())->first();

        if (is_null($shelter)){
            return redirect()->back();
        }
        if($shelter->approve == 0){
            return redirect('add_new_shelter')->with('status', 'Your application is being processed. Manager will contact you as soon as possible!');
        }
        else {
            $animal = Animal::findOrFail($id);
            $categories = AnimalCategory::all();
            return view('employee.animals.edit', compact('animal','categories','shelter'));
        }
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
        $shelters = Shelter::all();
        $shelter = $shelters->where('user_id', Auth::id())->first();

        if (is_null($shelter)){
            return redirect()->back();
        }
        if($shelter->approve == 0){
            return redirect('add_new_shelter')->with('status', 'Your application is being processed. Manager will contact you as soon as possible!');
        }
        else {
            $animal = Animal::findOrFail($id);
            $image = $request->file('image');
            if ($image != null)
            $animal->deleteImage();
            $animal->uploadImage($image);
            $animal->update($request->all());

            return redirect()->route('employee.animals.index')->with(['message' => 'Pet updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shelters = Shelter::all();
        $shelter = $shelters->where('user_id', Auth::id())->first();

        if (is_null($shelter)){
            return redirect()->back();
        }
        if($shelter->approve == 0){
            return redirect('add_new_shelter')->with('status', 'Your application is being processed. Manager will contact you as soon as possible!');
        }
        else {
            $animal = Animal::findOrFail($id);
            $animal->deleteImage();
            $animal->delete();
            return redirect()->route('employee.animals.index')->with(['message' => 'Pet deleted successfully']);
        }
    }
}

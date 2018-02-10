<?php

namespace App\Http\Controllers\Admin;

use App\Novelty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoveltiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novelties = Novelty::paginate(5);
        return view('admin.novelties.index', compact('novelties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.novelties.create');
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
        $news = Novelty::create($request->all());
        $news->uploadImage($request->file('image'));
        return redirect()->route('admin.novelties.index')->with(['message' => 'Category added successfully']);
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
        $novelty = Novelty::findOrFail($id);
        return view('admin.novelties.edit')->with('novelty', $novelty);
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
        $novelty = Novelty::findOrFail($id);
        $image = $request->file('image');
        $novelty->deleteImage();
        $novelty->uploadImage($image);
        $novelty->update($request->all());
        // return redirect()->route('admin.novelties.index')->with(['message' => 'News updated successfully!']);
            return redirect()->back();
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
        $novelties = Novelty::findOrFail($id);
        $novelties->delete();
        return redirect()->route('admin.novelties.index')->with(['message' => 'News deleted successfully!']);
    }
}

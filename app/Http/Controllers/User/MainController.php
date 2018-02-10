<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Animal;
use App\Shelter;
use App\Novelty;
use App\Http\Controllers\User\UsersFunction; // own functions for getting items from DB to views


class MainController extends Controller
{


   public function index()
    {

        $animals = Animal::get(['name', 'about', 'image']);
        $shelters = Shelter::where('approve', '>', '0')->get(['nameshelter','description','address']);

        $animalsForView =UsersFunction::GetFromArrey(5,$animals);
        $sheltersForView = UsersFunction::GetFromArrey(5,$shelters);

        return view('main.index', [
            'animals'=>$animalsForView,
            'shelters'=>$sheltersForView
        ]);

    }

    public function about()
    {
        return view('main.about');
    }


    public function new()
    {

        $news = Novelty::get(['id','title','short_description','image']);
        //dd($new);
        return view('main.new', ['news'=>$news]);
    }


    public function contacts()
    {
        return view('main.contacts');
    }

    public function add_new_shelter()
    {
        return view('main.add_new_shelter');
    }
//Test action
    public function showAnimal($id)
    {
      //$animal = Animal::all();
         $animal = Animal::where('id','=',$id)->get(['name','about','image']);
         //dd($animal[0]->name);
        return view('main.showAnimal',[
          "animal" => $animal
        ]);
    }

}

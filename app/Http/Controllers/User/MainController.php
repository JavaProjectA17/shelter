<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Animal;
use App\Shelter;
use App\Http\Controllers\User\UsersFunction; // own functions for getting items from DB to views


class MainController extends Controller
{


   public function index()
    {

        $animals = Animal::get(['name', 'about', 'image']);
        $shelters = Shelter::where('approve', '>', '0')->get(['nameshelter','description','address']);

        $animalsForView =UsersFunction::GetFromArrey(5,$animals);
        $sheltersForView = UsersFunction::GetFromArrey(3,$shelters);

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
        return view('main.new');
    }


    public function contacts()
    {
        return view('main.contacts');
    }

    public function add_new_shelter()
    {
        return view('main.add_new_shelter');
    }

}

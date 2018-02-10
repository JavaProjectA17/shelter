<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Animal;
use App\Shelter;

class MainController extends Controller
{

   public function index()
    {

        $animals = Animal::inRandomOrder()->get(['name', 'about', 'image'])->take(2);
        $shelters = Shelter::where('approve', '>', '0')->inRandomOrder()->get(['nameshelter','description','address'])->take(2);

        return view('main.index', [
            'animals'=>$animals,
            'shelters'=>$shelters
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

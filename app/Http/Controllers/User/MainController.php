<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Animal;
use App\Shelter;
use App\Novelty;

class MainController extends Controller
{

   public function index()
    {

        $animals = Animal::inRandomOrder()->get(['name', 'about', 'image'])->take(4);
        $shelters = Shelter::where('approve', '>', '0')->inRandomOrder()->get(['nameshelter','description','address'])->take(4);

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

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function index()
    {
        return view('main.index');
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

}

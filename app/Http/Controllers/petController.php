<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class petController extends Controller
{
    public function index()
    {

        return view('pet.index');
    }

    public function show()
    {

        return view('pet.show');
    }

  
  
}

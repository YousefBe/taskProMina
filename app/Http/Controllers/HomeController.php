<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
    $albums = [1,2,3,4,5];
    return view('welcome' , compact('albums'));
   }
}

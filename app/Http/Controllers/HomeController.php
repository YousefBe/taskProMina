<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
    $albums = Album::paginate(2);
    return view('welcome' , compact('albums'));
   }
}

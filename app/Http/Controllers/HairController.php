<?php

namespace App\Http\Controllers;

use App\Models\Hair;
use Illuminate\Http\Request;

class HairController extends Controller
{
  public function home() {
    $hairs = Hair::all();
    return view('home', compact('hairs'));
  }
  public function hair($id)
  {
    $hairs = Hair::all();

    $hair = Hair::find($id);
    if (!$hair) abort(404);
    $images = $hair->images;

    return view('hair', compact('hairs', 'hair', 'images'));
  }
}

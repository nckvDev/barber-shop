<?php

namespace App\Http\Controllers;

use App\Models\Hair;
use Illuminate\Http\Request;

class HairController extends Controller
{
  public function index()
  {
    $hairs = Hair::all();
    return view('admin.HairManage.index', compact('hairs'));
  }

}

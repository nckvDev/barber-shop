<?php

namespace App\Http\Controllers;

use App\Models\Hair;
use App\Models\Image;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function AdminDashboard()
  {
    return view('admin.welcome');
  }

  public function Hair()
  {
    $hairs = Hair::all();
    return view('admin.HairManage.index', compact('hairs'));
  }

  public function store(Request $request) {
//    dd($request->title, $request->sub_title, $request->description, $request->images);
    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'category' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $new_hairStyle = Hair::create($data);

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'].'-image-'.time().rand(1,1000).'.'.$image->extension();
        $image->move(public_path('hair_image'), $imageName);

        Image::create([
          'hair_id' => $new_hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return back()->with('success', 'Add');
  }

  public function view($id) {
    $hairs = Hair::all();

    $hair = Hair::find($id);
    if (!$hair) abort(404);
    $images = $hair->images;

    return view('view', compact('hairs','hair', 'images'));
  }
}

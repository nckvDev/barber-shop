<?php

namespace App\Http\Controllers;

use App\Models\Hair;
use App\Models\Image;
use App\Models\Shop;
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

  public function add()
  {
    return view('admin.HairManage.add');
  }

  public function store(Request $request) {

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

    return redirect()->route('admin.hair-manage')->with('success', 'Add');
  }

  public function view($id) {
    $hairs = Hair::all();
    $shops = Shop::all();

    $hair = Hair::find($id);
    if (!$hair) abort(404);
    $images = $hair->images;

    return view('view', compact('hairs', 'shops','hair', 'images'));
  }

  public function edit($id)
  {
    $hair = Hair::find($id);
    return view('admin.HairManage.edit', compact('hair'));
  }

  public function update(Request $request, $id)
  {
    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'category' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $hairStyle = Hair::findOrFail($id);

    // Update the model attributes
    $hairStyle->update($data);

    // Handle image updates
    if ($request->has('images')) {
      $newImages = [];

      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_image'), $imageName);

        $newImages[] = [
          'hair_id' => $hairStyle->id,
          'image' => $imageName
        ];
      }

      Image::where('hair_id', $hairStyle->id)->delete();

      Image::create($newImages);
    }

    return redirect()->route('admin.hair-manage')->with('success', 'Update');
  }

  public function delete($id)
  {
    $hairStyle = Hair::findOrFail($id);

    Image::where('hair_id', $hairStyle->id)->delete();

    $hairStyle->delete();

    return redirect()->back()->with('success', 'Delete');
  }

  public function Shop() {
    $shops = Shop::all();
    return view('admin.ShopManage.index', compact('shops'));
  }

  public function storeShop(Request $request) {

     $request->validate([
      'shop_name' => 'required',
      'status' => 'required',
      'phone_number' => 'required',
      'open_hours' => 'required',
      'shop_image' => 'required',
      'map_image' => 'required',
    ]);

    $shopImage = $request->file('shop_image');
    $mapImage = $request->file('map_image');

    $imgShopName = 'shop'.'-image-'.time().rand(1,1000).'.'.$shopImage->extension();
    $imgMapName = 'map'.'-image-'.time().rand(1,1000).'.'.$mapImage->extension();

    $shopImage->move(public_path('shop_image'), $imgShopName);
    $mapImage->move(public_path('shop_image'), $imgMapName);

    Shop::create([
      'shop_name' => $request['shop_name'],
      'status' => $request['status'],
      'phone_number' => $request['phone_number'],
      'open_hours' => $request['open_hours'],
      'shop_image' => $imgShopName,
      'map_image' => $imgMapName,
    ]);

    return back()->with('success', 'Add');
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Hair;
use App\Models\Image;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

  public function imageUpload(Request $request)
  {
    try {
      $allowedExts = array("gif", "jpeg", "jpg", "png");

      $temp = explode(".", $_FILES["file"]["name"]);

      $extension = end($temp);

      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      $mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);

      if ((($mime == "image/gif")
          || ($mime == "image/jpeg")
          || ($mime == "image/pjpeg")
          || ($mime == "image/x-png")
          || ($mime == "image/png"))
        && in_array($extension, $allowedExts)) {
        // Generate new random name.
        $name = sha1(microtime()) . "." . $extension;

        move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/images/" . $name);

        $response = new \StdClass();
        $response->link = "/images/" . $name;
        echo stripslashes(json_encode($response));
      }
    } catch (Exception $e) {
      Log::error($e->getMessage());
      return response()->json(['error' => 'An error occurred during file upload'], 500);
    }
  }

  public function imageRemove($id)
  {
    $image = Image::find($id);
    if(!$image) abort(404);
    unlink(public_path(('hair_image/'.$image->image)));
    $image->delete();
    return back()->with('success', 'Image deleted!');
  }


  public function store(Request $request)
  {

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
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_image'), $imageName);

        Image::create([
          'hair_id' => $new_hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return redirect()->route('admin.hair-manage')->with('success', 'Add');
  }

  public function view($id)
  {
    $hairs = Hair::all();
    $shops = Shop::all();

    $hair = Hair::find($id);
    if (!$hair) abort(404);
    $images = $hair->images;

    return view('view', compact('hairs', 'shops', 'hair', 'images'));
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

    if (!$hairStyle) abort(404);

    $hairStyle->update($data);

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_image'), $imageName);

        Image::create([
          'hair_id' => $hairStyle->id,
          'image' => $imageName
        ]);
      }
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

  public function Shop()
  {
    $shops = Shop::all();
    return view('admin.ShopManage.index', compact('shops'));
  }

  public function addShop()
  {
    return view('admin.ShopManage.add');
  }

  public function storeShop(Request $request)
  {
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

    $imgShopName = 'shop' . '-image-' . time() . rand(1, 1000) . '.' . $shopImage->extension();
    $imgMapName = 'map' . '-image-' . time() . rand(1, 1000) . '.' . $mapImage->extension();

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

    return redirect()->route('admin.shop-manage')->with('success', 'Add');
  }

  public function editShop($id)
  {
    $shop = Shop::find($id);
    return view('admin.ShopManage.edit', compact('shop'));
  }

  public function updateShop(Request $request, $id)
  {
    $request->validate([
      'shop_name' => 'required',
      'status' => 'required',
      'phone_number' => 'required',
      'open_hours' => 'required',
    ]);

    $shop = Shop::findOrFail($id);

    if ($request->hasFile('shop_image')) {
      // Remove old shop image if it exists
      if ($shop->shop_image) {
        Storage::delete('public/shop_image/' . $shop->shop_image);
//        unlink('/public/shop_image/'.$shop->shop_image);
      }

      $shopImage = $request->file('shop_image');
      $imgShopName = 'shop' . '-image-' . time() . rand(1, 1000) . '.' . $shopImage->extension();
      $shopImage->move(public_path('shop_image'), $imgShopName);
//      $shopImage->storeAs('public/shop_image', $imgShopName);
      $shop->shop_image = $imgShopName;
    }

    if ($request->hasFile('map_image')) {
      // Remove old map image if it exists
      if ($shop->map_image) {
        Storage::delete('public/shop_image/' . $shop->map_image);
//        unlink('shop_image/'.$shop->map_image);
      }

      $mapImage = $request->file('map_image');
      $imgMapName = 'map' . '-image-' . time() . rand(1, 1000) . '.' . $mapImage->extension();
      $mapImage->move(public_path('shop_image'), $imgMapName);
//      $mapImage->storeAs('public/shop_image', $imgMapName);
      $shop->map_image = $imgMapName;
    }

    $shop->shop_name = $request->input('shop_name');
    $shop->status = $request->input('status');
    $shop->phone_number = $request->input('phone_number');
    $shop->open_hours = $request->input('open_hours');
    $shop->save();

    return redirect()->route('admin.shop-manage')->with('success', 'Update');
  }

  public function deleteShop($id)
  {
    $shop = Shop::findOrFail($id);

    // Delete shop image if it exists
    if ($shop->shop_image) {
      Storage::delete('public/shop_image/' . $shop->shop_image);
    }

    // Delete map image if it exists
    if ($shop->map_image) {
      Storage::delete('public/shop_image/' . $shop->map_image);
    }

    // Delete the shop record
    $shop->delete();

    return redirect()->route('admin.shop-manage')->with('success', 'Shop deleted successfully');
  }


}

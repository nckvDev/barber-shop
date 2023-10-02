<?php

namespace App\Http\Controllers;

use App\Models\Hair;
use App\Models\Image;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
  public function AdminDashboard()
  {
    return view('admin.welcome');
  }

  public function Hair()
  {
//    $hairs = Hair::all();
    $hairs = DB::table('hairs')->where('category', 0)->get();
    return view('admin.HairManage.index', compact('hairs'));
  }

  public function HairStyle()
  {
    $hairs = DB::table('hairs')->where('category', 1)->get();
    return view('admin.HairStyleManage.index', compact('hairs'));
  }

  public function HairColor()
  {
    $hairs = DB::table('hairs')->where('category', 2)->get();
    return view('admin.HairColorManage.index', compact('hairs'));
  }

  public function HairCare()
  {
    $hairs = DB::table('hairs')->where('category', 3)->get();
    return view('admin.HairCareManage.index', compact('hairs'));
  }

  public function HairProducts()
  {
    $hairs = DB::table('hairs')->where('category', 4)->get();
    return view('admin.HairProductsManage.index', compact('hairs'));
  }
  public function HairVideo()
  {
    $hairs = DB::table('hairs')->where('category', 5)->get();
    return view('admin.HairVideoManage.index', compact('hairs'));
  }


  public function add()
  {
    return view('admin.HairManage.add');
  }

  public function addStyle()
  {
    return view('admin.HairStyleManage.add');
  }

  public function addColor()
  {
    return view('admin.HairColorManage.add');
  }

  public function addCare()
  {
    return view('admin.HairCareManage.add');
  }

  public function addProducts()
  {
    return view('admin.HairProductsManage.add');
  }
  public function addVideo()
  {
    return view('admin.HairVideoManage.add');
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

  public function videoUpload(Request $request)
  {
    try {
      $allowedExts = array("mp4", "webm", "ogg");

      $temp = explode(".", $_FILES["file"]["name"]);

      $extension = end($temp);

      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      $mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);

      if ((($mime == "video/mp4")
          || ($mime == "video/webm")
          || ($mime == "video/ogg"))
        && in_array($extension, $allowedExts)) {
        // Generate new random name.
        $name = sha1(microtime()) . "." . $extension;

        move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/videos/" . $name);

        $response = new \StdClass();
        $response->link = "/videos/" . $name;
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
    if (!$image) abort(404);
    unlink(public_path(('hair_image/' . $image->image)));
    $image->delete();
    return back()->with('success', 'Image deleted!');
  }
  public function imageStyleRemove($id)
  {
    $image = Image::find($id);
    if (!$image) abort(404);
    unlink(public_path(('hair_style_image/' . $image->image)));
    $image->delete();
    return back()->with('success', 'Image deleted!');
  }
  public function imageColorRemove($id)
  {
    $image = Image::find($id);
    if (!$image) abort(404);
    unlink(public_path(('hair_color_image/' . $image->image)));
    $image->delete();
    return back()->with('success', 'Image deleted!');
  }
  public function imageCareRemove($id)
  {
    $image = Image::find($id);
    if (!$image) abort(404);
    unlink(public_path(('hair_care_image/' . $image->image)));
    $image->delete();
    return back()->with('success', 'Image deleted!');
  }
  public function imageProductsRemove($id)
  {
    $image = Image::find($id);
    if (!$image) abort(404);
    unlink(public_path(('hair_products_image/' . $image->image)));
    $image->delete();
    return back()->with('success', 'Image deleted!');
  }
  public function imageVideoRemove($id)
  {
    $image = Image::find($id);
    if (!$image) abort(404);
    unlink(public_path(('hair_video_image/' . $image->image)));
    $image->delete();
    return back()->with('success', 'Image deleted!');
  }


  public function store(Request $request)
  {

    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $new_hairStyle = Hair::create(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 0,
        'sub_category' => $request['sub_category'],
        'description' => $request['description'],
      ]
    );

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
  public function storeStyle(Request $request)
  {

    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $new_hairStyle = Hair::create(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 1,
        'sub_category' => $request['sub_category'],
        'description' => $request['description'],
      ]
    );

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_style_image'), $imageName);

        Image::create([
          'hair_id' => $new_hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return redirect()->route('admin.hair-style')->with('success', 'Add');
  }
  public function storeColor(Request $request)
  {

    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $new_hairStyle = Hair::create(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 2,
        'sub_category' => $request['sub_category'],
        'description' => $request['description'],
      ]
    );

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_color_image'), $imageName);

        Image::create([
          'hair_id' => $new_hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return redirect()->route('admin.hair-color')->with('success', 'Add');
  }
  public function storeCare(Request $request)
  {

    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $new_hairStyle = Hair::create(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 3,
        'sub_category' => $request['sub_category'],
        'description' => $request['description'],
      ]
    );

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_care_image'), $imageName);

        Image::create([
          'hair_id' => $new_hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return redirect()->route('admin.hair-care')->with('success', 'Add');
  }
  public function storeProducts(Request $request)
  {

    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $new_hairStyle = Hair::create(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 4,
        'sub_category' => $request['sub_category'],
        'description' => $request['description'],
      ]
    );

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_products_image'), $imageName);

        Image::create([
          'hair_id' => $new_hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return redirect()->route('admin.hair-products')->with('success', 'Add');
  }
  public function storeVideo(Request $request)
  {

    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'description' => 'required'
    ]);

    $new_hairStyle = Hair::create(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 5,
        'sub_category' => 0,
        'description' => $request['description'],
      ]
    );

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_video_image'), $imageName);

        Image::create([
          'hair_id' => $new_hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return redirect()->route('admin.hair-video')->with('success', 'Add');
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

  public function editStyle($id)
  {
    $hair = Hair::find($id);
    return view('admin.HairStyleManage.edit', compact('hair'));
  }

  public function editColor($id)
  {
    $hair = Hair::find($id);
    return view('admin.HairColorManage.edit', compact('hair'));
  }

  public function editCare($id)
  {
    $hair = Hair::find($id);
    return view('admin.HairCareManage.edit', compact('hair'));
  }

  public function editProducts($id)
  {
    $hair = Hair::find($id);
    return view('admin.HairProductsManage.edit', compact('hair'));
  }
  public function editVideo($id)
  {
    $hair = Hair::find($id);
    return view('admin.HairVideoManage.edit', compact('hair'));
  }

  public function update(Request $request, $id)
  {
    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $hairStyle = Hair::findOrFail($id);

    if (!$hairStyle) abort(404);

    $hairStyle->update(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 0,
        'sub_category' => $request['sub_category'],
        'description' => $request['description'],
      ]
    );

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
  public function updateStyle(Request $request, $id)
  {
    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $hairStyle = Hair::findOrFail($id);

    if (!$hairStyle) abort(404);

    $hairStyle->update(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 1,
        'sub_category' => $request['sub_category'],
        'description' => $request['description'],
      ]
    );

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_style_image'), $imageName);

        Image::create([
          'hair_id' => $hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return redirect()->route('admin.hair-style')->with('success', 'Update');
  }
  public function updateColor(Request $request, $id)
  {
    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $hairStyle = Hair::findOrFail($id);

    if (!$hairStyle) abort(404);

    $hairStyle->update(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 2,
        'sub_category' => $request['sub_category'],
        'description' => $request['description'],
      ]
    );

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_color_image'), $imageName);

        Image::create([
          'hair_id' => $hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return redirect()->route('admin.hair-color')->with('success', 'Update');
  }
  public function updateCare(Request $request, $id)
  {
    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $hairStyle = Hair::findOrFail($id);

    if (!$hairStyle) abort(404);

    $hairStyle->update(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 3,
        'sub_category' => $request['sub_category'],
        'description' => $request['description'],
      ]
    );

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_care_image'), $imageName);

        Image::create([
          'hair_id' => $hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return redirect()->route('admin.hair-care')->with('success', 'Update');
  }
  public function updateProducts(Request $request, $id)
  {
    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'sub_category' => 'required',
      'description' => 'required'
    ]);

    $hairStyle = Hair::findOrFail($id);

    if (!$hairStyle) abort(404);

    $hairStyle->update(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 4,
        'sub_category' => $request['sub_category'],
        'description' => $request['description'],
      ]
    );

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_products_image'), $imageName);

        Image::create([
          'hair_id' => $hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return redirect()->route('admin.hair-products')->with('success', 'Update');
  }
  public function updateVideo(Request $request, $id)
  {
    $data = $request->validate([
      'title' => 'required',
      'sub_title' => 'required',
      'description' => 'required'
    ]);

    $hairStyle = Hair::findOrFail($id);

    if (!$hairStyle) abort(404);

    $hairStyle->update(
      [
        'title' => $request['title'],
        'sub_title' => $request['sub_title'],
        'category' => 5,
        'sub_category' => 0,
        'description' => $request['description'],
      ]
    );

    if ($request->has('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = $data['title'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
        $image->move(public_path('hair_video_image'), $imageName);

        Image::create([
          'hair_id' => $hairStyle->id,
          'image' => $imageName
        ]);
      }
    }

    return redirect()->route('admin.hair-video')->with('success', 'Update');
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
      'description' => 'required',
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
      'description' => $request['description'],
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

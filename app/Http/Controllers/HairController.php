<?php

namespace App\Http\Controllers;

use App\Models\Hair;
use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HairController extends Controller
{
  public function home()
  {
    $hairs = Hair::all();
    $hairTop = Hair::orderByDesc('created_at')->take(5)->get();
    $shops = Shop::all();
    return view('home', compact('hairs', 'hairTop', 'shops'));
  }

  public function hair($id)
  {
    $hairs = Hair::all();
    $shops = Shop::all();

    $hair = Hair::find($id);
    if (!$hair) abort(404);
    $images = $hair->images;

    return view('hair', compact('hairs', 'shops', 'hair', 'images'));
  }

  public function shop()
  {
    $hairs = Hair::orderByDesc('created_at')->take(5)->get();
    $shops = Shop::all();

    return view('shop', compact('shops', 'hairs'));
  }

  public function hairs()
  {
    $haired = Hair::where('category', 0)->get();
    $hairs = Hair::all();
    $shops = Shop::all();

    return view('hairs', compact('shops', 'hairs', 'haired'));
  }

  public function hairsStyle()
  {
    $haired = Hair::where('category', 1)->get();
    $hairs = Hair::all();
    $shops = Shop::all();

    return view('hairsStyle', compact('shops', 'hairs', 'haired'));
  }

  public function hairsColor()
  {
    $haired = Hair::where('category', 2)->get();
    $hairs = Hair::all();
    $shops = Shop::all();

    return view('hairsColor', compact('shops', 'hairs', 'haired'));
  }

  public function hairsCare()
  {
    $haired = Hair::where('category', 3)->get();
    $hairs = Hair::all();
    $shops = Shop::all();

    return view('hairsCare', compact('shops', 'hairs', 'haired'));
  }

  public function hairsProduct()
  {
    $haired = Hair::where('category', 4)->get();
    $hairs = Hair::all();
    $shops = Shop::all();

    return view('hairsProduct', compact('shops', 'hairs', 'haired'));
  }

  public function shopDetail($id)
  {
    $hairs = Hair::all();
    $shops = Shop::all();

    $days = array("วันจันทร์", "วันอังคาร", "วันพุธ", "วันพฤหัส", "วันศุกร์", "วันเสาร์", "วันอาทิตย์");

    $shop = Shop::find($id);

    return view('shopDetail', compact('shops', 'hairs', 'shop', 'days'));
  }

  public function shopReview($id)
  {
    $hairs = Hair::all();
    $shops = Shop::all();
    $reviews = Review::where('shop_id', $id)->get();

    $shop = Shop::find($id);

    return view('shopReview', compact('hairs', 'shops', 'shop', 'reviews'));
  }

  public function storeReview(Request $request, $id)
  {

    $request->validate([
      'review_text' => 'required|min:5',
    ]);

    $user_id = auth()->user()->id; // Assuming user is logged in

    Review::create([
      'user_id' => $user_id,
      'shop_id' => $id,
      'review_text' => $request['review_text'],
    ]);

    return back()->with('success', 'Review created successfully.');
  }
}

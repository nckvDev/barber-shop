<?php

namespace App\Http\Controllers;

use App\Models\Hair;
use App\Models\Shop;
use Illuminate\Http\Request;

class HairController extends Controller
{
  public function home() {
    $hairs = Hair::all();
    $shops = Shop::all();
    return view('home', compact('hairs', 'shops'));
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

  public function shop() {
    $hairs = Hair::all();
    $shops = Shop::all();

    return view('shop', compact('shops','hairs' ));
  }

  public function shopDetail($id) {
    $hairs = Hair::all();
    $shops = Shop::all();

    $days = array("วันจันทร์", "วันอังคาร", "วันพุธ", "วันพฤหัส", "วันศุกร์", "วันเสาร์", "วันอาทิตย์");

    $shop = Shop::find($id);

    return view('shopDetail', compact('shops', 'hairs', 'shop', 'days'));
  }

  public function shopReview($id) {
    $hairs = Hair::all();
    $shops = Shop::all();

    $shop = Shop::find($id);

    return view('shopReview', compact('hairs', 'shops', 'shop'));
  }
}

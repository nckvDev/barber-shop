<?php

namespace App\Http\Controllers;

use App\Models\Hair;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index(): View

  {
    // Check for search input
    if (request('search')) {
      $items = Hair::where('title', 'like', '%' . request('search') . '%')->get();
    } else {
      $items = Hair::all();
    }
    return view('searchDemo')->with('users', $items);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function autocomplete(Request $request)
  {
    $query = $request->get('query');

    $results = Hair::where('title', 'like', '%' . $query . '%')->select('id', 'title')->get(); // Select the 'id' along with 'name'

    return response()->json($results);
  }
}

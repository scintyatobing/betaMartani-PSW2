<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilTani;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $newHasilTani  = HasilTani::latest()->simplePaginate(6);
        return view('home', compact('newHasilTani'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function search(Request $request)
    {
        $inputSearch = $request['inputSearch'];
        $keyResult = DB::table('hasiltani')
        ->where('nama_hasiltani', 'LIKE', '%'.$inputSearch.'%')
        ->get();
        echo $keyResult;
    }
}

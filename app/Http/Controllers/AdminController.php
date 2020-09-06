<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->count();
        $products = DB::table('products')->count();
        $rooms = DB::table('rooms')->count();
        $vehicles = DB::table('vehicles')->count();
        $cities = DB::table('cities')->count();
        $streets = DB::table('streets')->count();
        $categories = DB::table('categories')->count();
        $advertisements = DB::table('advertisements')->count();
        return view('admin.adminHome',compact('users','products','rooms','vehicles','cities','streets','categories','advertisements'));
    }
    public function online($id)
    {
        $adver=Advertisement::find($id);
        $adver->status=1;
        $adver->save();
        return redirect()->back();
    }
    public function offline($id)
    {
        $adver=Advertisement::find($id);
        $adver->status=0;
        $adver->save();
        return redirect()->back();
    }
}

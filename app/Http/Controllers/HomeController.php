<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\City;
use App\Product;
use App\Room;
use App\Vehicle;
use App\Sale;
use DateTime;
use Carbon\Carbon; //fordate time
use Illuminate\Support\Facades\Auth;
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
        $this->middleware(['auth','verified']); //go to middleware/authenticate.php to redirect to a page when not authenticated
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }
   
    public function createAd(Request $request)
    {
         $categories=Category::all();
         $cities=City::all();
         return view('createAds',compact('categories','cities'));
    }
    
    public function statusOff($id)
    {
        $product=Product::find($id);
        $product->status=0;
        $product->save();
        return redirect(route('user-profile.index'));
    }
    
    
    public function statusOn(Request $request,$id)
    {
        $product=Product::find($id);
        $product->status=1;
        $product->expires_at=now()->addDays($product->ad_duration);
        $product->save();
        return redirect(route('user-profile.index'));
    }
    public function roomStatusOff($id)
    {
        $room=Room::find($id);
        $room->status=0;
        $room->save();
        return redirect(route('user-profile.index'));
    }
    public function roomStatusOn(Request $request,$id)
    {
        $room=Room::find($id);
        $room->status=1;
        $room->expires_at=now()->addDays($room->ad_duration);
        $room->save();
        return redirect(route('user-profile.index'));
    }
    public function chat()
    {
        return view('chat');
    }
    public function delete($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->back();
    }
    public function deleteRoom($id)
    {
        Room::where('id',$id)->delete();
        return redirect()->back();
    }
    public function deleteVehicle($id)
    {
        Vehicle::where('id',$id)->delete();
        return redirect()->back();
    }
    public function createSale()
    {
        return view('saleAnnounce');
    }
    public function advertise()
    {
        $categories=Category::all();
        return view('layouts.advertise',compact('categories'));
    }
    public function sale(Request $request)
    {
        /*
         $this->validate($request,[
            'user_id' => 'required',
            'city' => 'required',
            'prod_desc' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'days' => 'required'
         ]);
         */
        $start_date=$request->start_date;
         $sale=new Sale;
         $sale->user_id = $request->user_id;
         $sale->city_id = $request->city;
         $sale->product_desc = $request->prod_desc;
         $sale->location = $request->location;
         $sale->start_date=$start_date;
         $sale->end_date=now()->addDays($request->days);
         $sale->days=$request->days;
         $sale->save();
         return redirect(route('index'));
    }
}

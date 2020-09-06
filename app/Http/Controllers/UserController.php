<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\City;
use App\Product;
use App\Room;
use App\Vehicle;
use App\Sale;
use App;
use App\Advertisement;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\SearchRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    
    public function index()
    {
        $categories=Category::all();
        $cities=city::orderBy('city')->get();
        $products=Product::all()->take(8);
        $rooms=Room::all()->take(4);
        $vehicles=Vehicle::all()->take(4);
        $sale=Sale::all()->random();
        $adver=Advertisement::all()->random();
        return view('welcome',compact('categories','cities','products','vehicles','rooms','sale','adver'));
    }
    public function language($lang){
        App::setlocale($lang);
        $categories=Category::all();
        $cities=City::all();
        $products=Product::all()->take(8);
        $rooms=Room::all()->take(4);
        $vehicles=Vehicle::all()->take(4);
        $sale=Sale::all()->random();
        return view('welcome',compact('categories','cities','products','vehicles','rooms','sale'));
    }
    
    public function login()
    {
        $categories=category::all();
        $cities=city::orderBy('city')->get();
        return view('login',compact('categories','cities'));
    }
    public function search(Request $request)
    {
        $searchWord=$request->search;
        $products = Product::query()->where('title', 'like', "%{$searchWord}%")->paginate(4);
        $rooms = Room::query()->where('title', 'like', "%{$searchWord}%")->paginate(4);
        $vehicles = Vehicle::query()->where('title', 'like', "%{$searchWord}%")->paginate(4);
        $categories=Category::all();
        return view('searchList',compact('products','rooms','vehicles','categories'));  
    }
    public function advance()
    {
        $categories=Category::all();
        $cities=City::all();
        return view('layouts.advanceSearch',compact('categories','cities'));
    }
    public function advSearch(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
            'category'=> 'required',
            'city'=> 'required',
            'description' => 'required',
        ]);
         
        $search=new SearchRecord;
        $search->title=$request->title;
        $search->category_id=$request->category;
        $search->city_id=$request->city;
        $search->user_id=Auth::user()->id;
        $search->description=$request->description;
        $search->save();
        return redirect()->back();   
    }
    public function category($id)
    {
        $product=null;
        if($id == 'product-list')
        {
            $products=Product::paginate(20);
        }
        else
        {
            $products=Product::where('category_id', $id)->paginate(4);
        }
        
        $categories=category::all();
        $cities=city::all();
        return view('categories',compact('categories','cities','products'));
    }
    public function spaceList($id)
    {
        $categories=category::all();
        $cities=city::all();
        $spaces=null;
        $citylist=array();
        foreach($cities as $city ){
            array_push($citylist,$city->city);
           
        }
        if(in_array($id,$citylist))
        {
            $city=City::where('city',$id)->first();
            $spaces=Room::where('city_id',$city->id)->paginate(20);
        }
        else
        {
            if(is_int($id))
            {
                $spaces=Room::where('street_id',$id)->paginate(20);
            }
            elseif($id == 'Flat' || $id == 'Room' || $id='House')
            {
                $spaces=Room::where('type',$id)->paginate(20);
            }
        }
        
        return view('spaceList',compact('categories','cities','spaces'));
    }
    
    public function vehicleList($id)
    {
        $categories=category::all();
        $cities=city::all();
        $vehicles=null;
        $vehicleList=array();
        foreach($cities as $city ){
            array_push($vehicleList,$city->city);
           
        }
        if(in_array($id,$vehicleList))
        {
            $city=City::where('city',$id)->first();
            $vehicles=Vehicle::where('city_id',$city->id)->paginate(20);
        }
        else{
            $vehicles=Vehicle::where('vehicle_type',$id)->paginate(20);
        }
        return view('vehicleList',compact('categories','cities','vehicles'));
    }
    public function cityProducts($id)
    {
        $products=Product::where('city_id', $id)->get();
        $categories=category::all();
        $cities=city::all();
        return view('categories',compact('categories','cities','products'));
    }

    public function filter(Request $request)
    {
        //return true;
        $category=$request->category;
        $city=$request->city;
        $range=$request->range;
        $products=null;
        $min_price=null;
        $max_price=null;
        if($request->min_price == null || $request->max_price == null)
        {
            $min_price=0;
            $max_price=1000000;

        }
        else
        {
            $min_price=$request->min_price;
            $max_price=$request->max_price;
        }
        
        if($category != null && $city != null )
        {
            
            $products=Product::where('category_id',$category)->where('city_id',$city)->whereBetween('price',[$min_price,$max_price])->get();
        }
        else if($category != null && $city == null)
        {
            $products=Product::where('category_id',$category)->whereBetween('price',[$min_price,$max_price])->get();
        }
        else if($category == null && $city != null)
        {
            $products=Product::where('city_id',$city)->whereBetween('price',[$min_price,$max_price])->get();
        }
        else
        {
            $products=Product::whereBetween('price',[$min_price,$max_price])->get();
        }
        //return $products;
        $categories=category::all();
        return view('categories',compact('categories','cities','products'));
    }
    public function spaceFilter(Request $request)
    {
        $city=$request->city;
        $suitable=$request->suitable_for;
        $spaces=null;
        $min_rent=null;
        $max_rent=null;
        if($request->min_rent == null || $request->max_rent == null)
        {
            $min_rent=0;
            $max_rent=10000;

        }
        else
        {
            $min_rent=$request->min_rent;
            $max_rent=$request->max_rent;
        }
        if($suitable != null && $city != null )
        {
            
            $spaces=Room::where('suitable_for',$suitable)->where('city_id',$city)->whereBetween('rent',[$min_rent,$max_rent])->paginate(12);
        }
        else if($suitable != null && $city == null)
        {
            $products=Room::where('suitable_for',$suitable)->whereBetween('rent',[$min_rent,$max_rent])->paginate(12);
        }
        else if($suitable == null && $city != null)
        {
            $products=Room::where('city_id',$city)->whereBetween('rent',[$min_rent,$max_rent])->paginate(12);
        }
        else
        {
            $products=Room::whereBetween('rent',[$min_rent,$max_rent])->paginate(12);
        }
        $categories=category::all();
        $cities=city::all();
        return view('spaceList',compact('categories','cities','spaces'));
    }
    public function vehicleFilter(Request $request)
    {
        $categories=category::all();
        $cities=city::all();
        $type=$request->vehicle_type;
        $city=$request->city;
        $min_charge=null;
        $max_charge=null;
        $vehicles=null;

        if($request->min_charge == null || $request->max_charge == null)
        {
            $min_charge=0;
            $max_charge=10000;

        }
        else
        {
            $min_charge=$request->min_charge;
            $max_charge=$request->max_charge;
        }
        if($type != null && $city != null )
        {
            
            $vehicles=Vehicle::where('vehicle_type',$type)->where('city_id',$city)->whereBetween('daily_charge',[$min_charge,$max_charge])->get();
        }
        else if($type != null && $city == null)
        {
            $vehicles=Vehicle::where('vehicle_type',$type)->whereBetween('daily_charge',[$min_charge,$max_charge])->get();
        }
        else if($type == null && $city != null)
        {
            $vehicles=Vehicle::where('city_id',$city)->whereBetween('daily_charge',[$min_charge,$max_charge])->get();
        }
        else
        {
            $vehicles=Vehicle::whereBetween('daily_charge',[$min_charge,$max_charge])->get();
        }
        return view('vehicleList',compact('categories','cities','vehicles'));
    }
    public function contact()
    {
        $categories=Category::all();
        return view('layouts.footerStaticPages.contact',compact('categories'));
    }
    public function faq()
    {
        $categories=Category::all();
        return view('layouts.footerStaticPages.faq',compact('categories'));
    }
    
    public function terms()
    {
        $categories=Category::all();
        return view('layouts.footerStaticPages.terms',compact('categories'));
    }
    public function policy()
    {
        $categories=Category::all();
        return view('layouts.footerStaticPages.policy',compact('categories'));
    }
    public function refund()
    {
        return view('layouts.footerStaticPages.refund');
    }
    public function developer()
    {
        $categories=Category::all();
        return view('layouts.footerStaticPages.developer',compact('categories'));
    }
    public function quickElectronics()
    {
        $products=Product::where('category_id',1)->get();
        $categories=category::all();
        $cities=city::all();
        return view('categories',compact('categories','cities','products'));
    }
    public function quickCarRental()
    {
        
    }
    public function quickStudentRoom()
    {
        //return view('layouts.footerStaticPages.contact');
    }
    public function send(Request $request)
    {   
        
        $to_name = 'HaatNepal';
        $to_email = 'pashupatisah112@gmail.com';
        $data = array('name'=>'visitor', 'body' => 'I want to get the most Recent update');
        //$mail=$request->mail;
        //return $mail;
        Mail::send( $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('Site Information');
            $message->from('jiban.kandel112@gmail.com','Recent Update');
        });
        $categories=Category::all();
        return view('welcome',compact('categories'));
        
    }
}

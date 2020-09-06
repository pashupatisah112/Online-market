<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\City;
use App\Street;
use App\Product;
use Carbon\Traits\Timestamp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $categories=category::all();
        $cities=city::all();
        $streets_name=DB::table('streets')->pluck('street_name');
        return view('sell',compact('categories','cities','streets_name'));
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $adType=$request->adForm;
        $categories=category::all();
        $cities=city::all();
        $streets_name=DB::table('streets')->pluck('street_name');

        return view('createAdsForm',compact('categories','cities','streets_name','adType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request,[
            'title'=> 'required',
            'category'=> 'required',
            'condition'=> 'required',
            'used_time' => 'required',
            'ad_duration'=>'required',
            'negotiable'=> 'required',
            'delivery_service'=> 'required',
            'city'=>'required',
            'street'=>'required',
            'price'=>'required',
            'productImage'=> 'required',
        ]);
        
        $street_id=null;
        $street=$request->street;
        $streets_name=DB::table('streets')->pluck('street_name');
        
        if(in_array($street,$streets_name->toArray()))
        { 
           $street_id=DB::table('streets')->where('street_name','=',$street)->value('id');
        }
        else
        {
            
            $streets=new street;
            $streets->street_name=$street;
            $streets->city_id=$request->city;
            $streets->save();
            $street_id=DB::table('streets')->where('street_name','=',$street)->value('id');
        }
        
        $product=new Product;
        
        //$product->image=$imgName;
        if($request->hasFile('productImage')){
            $filename=$request->productImage->store('public');
            //$filename->store('public/productImage',$filename);
            
        }
        $product->user_id=$request->user_id;
        //return $p;
        $product->title=$request->title;
        $product->image=$filename;
        $product->company=$request->company;
        $product->condition=$request->condition;
        $product->used_time=$request->used_time;
        $product->ad_duration=$request->ad_duration;
        $product->negotiable=$request->negotiable;
        $product->delivery_service=$request->delivery_service;
        $product->price=$request->price;
        $product->delivery_charge=$request->charge;
        $product->description=$request->description;
        $product->category_id=$request->category;
        $product->city_id=$request->city;
        $product->street_id=$street_id;
        $product->user_id=$request->user_id;
        $product->expires_at=now()->addDays($request->ad_duration);
        
        $product->save();
        return redirect(route('user-profile.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        $recommend_city=$product->city_id;
        $recommend_category=$product->category_id;
        $categories=Category::all();
        $cities=City::all();
        $recommends=Product::where('category_id',$recommend_category)->where('city_id',$recommend_city)->get();
        $recommen=Product::where('category_id',$recommend_category)->where('city_id',$recommend_city)->get();
        return view('details',compact('product','categories','cities','recommends'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=category::all();
        $cities=city::all();
        $product=Product::where('id',$id)->first();
        //return $product;
        $streets_name=DB::table('streets')->pluck('street_name');
        return view('layouts.productEdit',compact('categories','cities','product','streets_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title'=> 'required',
            'category'=> 'required',
            'condition'=> 'required',
            'used_time' => 'required',
            'ad_duration'=>'required',
            'negotiable'=> 'required',
            'delivery_service'=> 'required',
            'city'=>'required',
            'street'=>'required',
            'price'=>'required',
            'productImage'=> 'required',
        ];
        $customMessages =[
            'required' => 'This field is needed to be filled'
        ];
        $this->validate($request,$rules,$customMessages);
        
        $street_id=null;
        $street=$request->street;
        $streets_name=DB::table('streets')->pluck('street_name');
        
        if(in_array($street,$streets_name->toArray()))
        { 
           $street_id=DB::table('streets')->where('street_name','=',$street)->value('id');
        }
        else
        {
            
            $streets=new street;
            $streets->street_name=$street;
            $streets->city_id=$request->city;
            $streets->save();
            $street_id=DB::table('streets')->where('street_name','=',$street)->value('id');
        }
        
        $product=Product::find($id);
        
        //$product->image=$imgName;
        if($request->hasFile('productImage')){
            $filename=$request->productImage->store('public');
            //$filename->store('public/productImage',$filename);
            
        }
        $product->user_id=$request->user_id;
        //return $p;
        $product->title=$request->title;
        $product->image=$filename;
        $product->company=$request->company;
        $product->condition=$request->condition;
        $product->used_time=$request->used_time;
        $product->ad_duration=$request->ad_duration;
        $product->negotiable=$request->negotiable;
        $product->delivery_service=$request->delivery_service;
        $product->price=$request->price;
        $product->delivery_charge=$request->charge;
        $product->description=$request->description;
        $product->category_id=$request->category;
        $product->city_id=$request->city;
        $product->street_id=$street_id;
        $product->user_id=$request->user_id;
        $product->expires_at=now()->addDays($request->ad_duration);
        
        $product->save();
        return redirect(route('user-profile.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "destroyed";
        Product::where('id',$id)->delete();
        return redirect()->back();
    }
}

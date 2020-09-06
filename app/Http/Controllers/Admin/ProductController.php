<?php

namespace App\Http\Controllers\Admin;

use App\category;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\city;
use App\street;
//use DB;


class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::all();
        return view('admin.layouts.product.show',compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::all();
        $cities=city::all();
        $streets_name=DB::table('streets')->pluck('street_name');
        //return $streets;
        return view('admin.layouts.product.create',compact('categories','cities','streets_name'));
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
            'name'=> 'required',
            'category'=> 'required',
            'condition'=> 'required',
            'used_time' => 'required',
            'ad_duration'=>'required',
            'negotiable'=> 'required',
            'delivery_service'=> 'required',
            'city'=>'required',
            'street'=>'required',
            'price'=>'required',
            'delivery_charge'=> 'required',
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
        if($request->hasFile('productImage')){
            $filename=$request->productImage->store('public');
        }
        
        $product->product_name=$request->name;
        $product->image=$filename;
        $product->company=$request->company;
        $product->condition=$request->condition;
        $product->used_time=$request->used_time;
        $product->ad_duration=$request->ad_duration;
        $product->negotiable=$request->negotiable;
        $product->delivery_service=$request->delivery_service;
        $product->price=$request->price;
        $product->delivery_charge=$request->delivery_charge;
        $product->description=$request->description;
        $product->category_id=$request->category;
        $product->city_id=$request->city;
        $product->street_id=$street_id;
        $product->save();
        
        return redirect(route('product.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "shown";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $street_id=null;
        //return $street_id;
        $street=$request->street;
        //return $street;
        $streets_name=DB::table('streets')->pluck('street_name');
        //return $streets_name;
        if(in_array($street,$streets_name->toArray()))
        {
           //return 'yes';
           $street_id=DB::table('streets')->where('street_name','=',$street)->value('id');
           //return $street_id;
        }
        else
        {
            $streets=new street;
            $streets->street_name=$street;
            $streets->city_id=$request->city;
            $streets->save();
            $street_id=DB::table('streets')->where('street_name','=',$street)->value('id');
            //return $street_id;
        }

        if($request->hasFile('productImage')){
            $imgName=$request->productImage->store('public/productImage');
        }

        $product=Product::find($id);
        $product->image=$imgName;
        $product->product_name=$request->name;
        $product->company=$request->company;
        $product->condition=$request->condition;
        $product->used_time=$request->used_time;
        $product->ad_duration=$request->ad_duration;
        $product->negotiable=$request->negotiable;
        $product->delivery_service=$request->delivery_service;
        $product->price=$request->price;
        $product->delivery_charge=$request->delivery_charge;
        $product->description=$request->description;
        $product->category_id=$request->category;
        $product->city_id=$request->city;
        $product->street_id=$street_id;
        $product->save();
        
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->back();
    }
}

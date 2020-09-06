<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\City;
use App\Room;
use App\Street;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spaces=Room::paginate(20);
        $categories=category::all();
        $cities=city::all();
        return view('spaceList',compact('categories','cities','spaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'type'=> 'required',
            'flat_type'=> 'required',
            'floor' => 'required',
            'num_rooms'=>'required',
            'suitable_for'=> 'required',
            'city'=>'required',
            'street'=>'required',
            'rent'=>'required',
            'roomImage'=> 'required',
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
            $streets=new Street;
            $streets->street_name=$street;
            $streets->city_id=$request->city;
            $streets->save();
            $street_id=DB::table('streets')->where('street_name','=',$street)->value('id');
        }
        
        $room=new Room;
        
        if($request->hasFile('roomImage')){
            $filename=$request->roomImage->store('public');
        }

        $room->user_id=$request->user_id;
        $room->title=$request->title;
        $room->type=$request->type;
        $room->flat_type=$request->flat_type;
        $room->floor=$request->floor;
        $room->num_rooms=$request->num_rooms;
        $room->suitable_for=$request->suitable_for;
        $room->rent=$request->rent;
        $room->ad_duration=$request->ad_duration;
        $room->image=$filename;
        $room->drink_water=$request->water;
        $room->parking=$request->parking;
        $room->shared_kitchen=$request->kitchen;
        $room->shared_bathroom=$request->bathroom;
        $room->bill_included=$request->bill;
        $room->wifi=$request->wifi;
        $room->description=$request->description;
        
        $room->city_id=$request->city;
        $room->street_id=$street_id;
        $room->expires_at=now()->addDays($request->ad_duration);
        $room->save();

        return redirect(route('profile'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room=Room::find($id);
        $recommend_city=$room->city->id;
        $recommend_suitable_for=$room->suitable_for;
        $categories=Category::all();
        $cities=City::all();
        $recommends=Room::where('suitable_for',$recommend_suitable_for)->where('city_id',$recommend_city)->get();
        $streets= Street::where('city_id',$room->city_id)->get();
        return view('spaceDetails',compact('room','categories','cities','recommends','streets'));
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
        $rental=Room::where('id',$id)->first();
        //return $product;
        $streets_name=DB::table('streets')->pluck('street_name');
        return view('layouts.rentalEdit',compact('categories','cities','room','streets_name','rental'));
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
        $this->validate($request,[
            'title'=> 'required',
            'type'=> 'required',
            'flat_type'=> 'required',
            'floor' => 'required',
            'num_rooms'=>'required',
            'suitable_for'=> 'required',
            'city'=>'required',
            'street'=>'required',
            'rent'=>'required',
            'roomImage'=> 'required',
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
            $streets=new Street;
            $streets->street_name=$street;
            $streets->city_id=$request->city;
            $streets->save();
            $street_id=DB::table('streets')->where('street_name','=',$street)->value('id');
        }
        
        $room=Room::find($id);
        
        if($request->hasFile('roomImage')){
            $filename=$request->roomImage->store('public');
        }

        $room->user_id=$request->user_id;
        $room->title=$request->title;
        $room->type=$request->type;
        $room->flat_type=$request->flat_type;
        $room->floor=$request->floor;
        $room->num_rooms=$request->num_rooms;
        $room->suitable_for=$request->suitable_for;
        $room->rent=$request->rent;
        $room->ad_duration=$request->ad_duration;
        $room->image=$filename;
        $room->drink_water=$request->water;
        $room->parking=$request->parking;
        $room->shared_kitchen=$request->kitchen;
        $room->shared_bathroom=$request->bathroom;
        $room->bill_included=$request->bill;
        $room->wifi=$request->wifi;
        $room->description=$request->description;
        
        $room->city_id=$request->city;
        $room->street_id=$street_id;
        $room->expires_at=now()->addDays($request->ad_duration);
        $room->save();

        return redirect(route('profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "destroy";
    }
}

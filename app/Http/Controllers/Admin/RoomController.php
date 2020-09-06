<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Room;
use App\city;
use App\Street;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=room::all();
        $cities=city::all();
        return view('admin.layouts.room.show',compact('rooms','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=city::all();
        $streets=DB::table('streets')->pluck('street_name');
        return view('admin.layouts.room.create',compact('cities','streets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $street_id=null;
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

        $rooms=new Room;
        $rooms->title=$request->title;
        $rooms->type=$request->type;
        $rooms->flat_type=$request->flat_type;
        $rooms->floor=$request->floor;
        $rooms->num_rooms=$request->no_of_rooms;
        $rooms->suitable_for=$request->suitable;
        $rooms->rent=$request->rent;
        $rooms->map_location=$request->location;
        $rooms->ad_duration=$request->ad_duration;
        $rooms->image=$request->roomImage;
        $rooms->drink_water=$request->water;
        $rooms->parking=$request->parking;
        $rooms->shared_kitchen=$request->kitchen;
        $rooms->shared_bathroom=$request->bathroom;
        $rooms->bill_included=$request->bill;
        $rooms->wifi=$request->wifi;
        $rooms->description=$request->description;
        
        $rooms->city_id=$request->city;
        $rooms->street_id=$street_id;
        $rooms->save();

        return redirect(route('room.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::where('id',$id)->delete();
        return redirect()->back();
    }
}

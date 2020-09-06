<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\City;
use App\Room;
use App\Vehicle;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles=Vehicle::paginate(4);
        $categories=category::all();
        $cities=city::all();
        return view('vehicleList',compact('categories','cities','vehicles'));
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
            'title' => 'required',
            'vehicle_type' => 'required',
            'condition' => 'required',
            'city' => 'required',
            'rent' => 'required',
            'vehicleImage' => 'required',
            'description' => 'required',
        ]);

        
        $vehicle=new Vehicle;
        
        if($request->hasFile('vehicleImage')){
            $filename=$request->vehicleImage->store('public');
            //$filename->store('public/vehicleImage',$filename);
            
        }

        $vehicle->user_id=$request->user_id;
        $vehicle->title=$request->title;
        $vehicle->vehicle_type=$request->vehicle_type;
        $vehicle->condition=$request->condition;
        $vehicle->capacity=$request->capacity;
        $vehicle->daily_charge=$request->rent;
        $vehicle->image=$filename;
        $vehicle->description=$request->description;
        
        $vehicle->city_id=$request->city;
        $vehicle->save();

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
        $vehicle=Vehicle::find($id);
        $recommend_city=$vehicle->city_id;
        $recommend_type=$vehicle->vehicle_type;
        $categories=Category::all();
        $cities=City::all();
        $recommends=Vehicle::where('city_id',$recommend_city)->where('vehicle_type',$recommend_type)->take(3)->get();
        $recommend2=Vehicle::where('city_id',$recommend_city)->where('vehicle_type',$recommend_type)->skip(3)->take(3)->get();
        
        return view('vehicleDetails',compact('vehicle','categories','cities','recommends','recommend2'));
    
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
        $vehicle=Vehicle::where('id',$id)->first();
        $streets_name=DB::table('streets')->pluck('street_name');
        return view('layouts.vehicleEdit',compact('categories','cities','vehicle','streets_name'));
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
            'vehicle_type'=> 'required',
            'condition'=> 'required',
            'capacity' => 'required',
            'charge'=>'required',
            'city'=>'required',
            'vehicleImage'=> 'required',
        ];
        $customMessages =[
            'required' => 'This field is needed to be filled'
        ];
        $this->validate($request,$rules,$customMessages);

        
        $vehicle=Room::find($id);
        
        if($request->hasFile('vehicleImage')){
            $filename=$request->vehicleImage->store('public');
            //$filename->store('public/vehicleImage',$filename);
            
        }

        $vehicle->user_id=$request->user_id;
        $vehicle->title=$request->title;
        $vehicle->vehicle_type=$request->vehicle_type;
        $vehicle->condition=$request->condition;
        $vehicle->capacity=$request->capacity;
        $vehicle->daily_charge=$request->charge;
        $vehicle->image=$request->vehicleImage;
        $vehicle->description=$request->description;
        
        $vehicle->city_id=$request->city;
        $vehicle->save();

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
        Vehicle::where('id',$id)->delete();
        return redirect()->back();
    }
}

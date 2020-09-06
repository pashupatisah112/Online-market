<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\City;
use App\Product;
use App\Room;
use App\Vehicle;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']); //go to middleware/authenticate.php to redirect to a page when not authenticated
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth()->user();
        $user_id=$user->id;
        $current_timestamp = now(); 
        $categories=category::all();
        $cities=city::all();
        $products=Product::where('user_id', $user_id)->get();
        $rentals=Room::where('user_id', $user_id)->get();
        $vehicles=Vehicle::where('user_id',$user_id)->get();

        return view('profile',compact('products','categories','cities','rentals','vehicles'));
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
        //
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
        $categories=category::all();
        $user=user::where('id',$id)->first();
        return view('layouts.editProfile',compact('categories','user'));
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
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
        ]);
        $user=user::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->save();
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
        user::where('id',$id)->delete();
        return redirect()->back();
    }
}

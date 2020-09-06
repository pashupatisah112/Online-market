<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= user::all();
    
        return view('admin.layouts.user.show',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.user.create');
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
            'email'=> 'required',
            'password'=> 'required',
        ]);

        if($request->hasFile('profile')){
            $imgName=$request->profile->store('public/userImage');
        }
        $product=new user;
        $product->profile=$imgName;
        $product->name=$request->name;
        $product->email=$request->email;
        $product->password=$request->password;
        $product->profile=$request->profile;
        $product->save();

        return view('admin.layouts.user.show');
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
        $user=user::where('id',$id)->first();
        return view('admin.layouts.user.edit');
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
            'password'=> 'required',
        ]);

        if($request->hasFile('profile')){
            $imgName=$request->profile->store('public/userImage');
        }
        $product=user::find($id);
        $product->profile=$imgName;
        $product->name=$request->name;
        $product->email=$request->email;
        $product->password=$request->password;
        $product->profile=$request->profile;
        $product->save();

        return view('admin.layouts.user.show');
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

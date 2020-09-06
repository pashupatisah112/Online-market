<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Advertisement;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advers=Advertisement::all();
        return view('admin.layouts.Advertisement.show',compact('advers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.Advertisement.create');
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
            'num_days'=> 'required',
            'link'=> 'required',
            'banner' => 'required',
        ]);
        if($request->hasFile('banner')){
            $filename=$request->banner->store('public/images/banners');
        
        }
        $advers=new Advertisement;
        $advers->title=$request->title;
        $advers->num_days=$request->num_days;
        $advers->link=$request->link;
        $advers->banner=$filename;
        if(Auth::user())
        {
            $advers->user_id=Auth::user()->id;
        }
        
        $advers->save();
        return redirect(route('advertisement.index'));
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
        $this->validate($request,[
            'title'=> 'required',
            'num_days'=> 'required',
            'link'=> 'required',
            'banner' => 'required',
        ]);
        if($request->hasFile('banner')){
            $filename=$request->banner->store('public/images/banners');
        
        }
        $advers=Advertisement::find($id);
        $advers->title=$request->title;
        $advers->num_days=$request->num_days;
        $advers->link=$request->link;
        $advers->banner=$filename;
        if(Auth::user())
        {
            $advers->user_id=Auth::user()->id;
        }
        
        $advers->save();
        return redirect(route('advertisement.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

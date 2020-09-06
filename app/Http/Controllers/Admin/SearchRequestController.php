<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SearchRecord;

class SearchRequestController extends Controller
{
    public function index()
    {
        $searches=SearchRecord::all();
        return view('admin.layouts.searchRecord.show',compact('searches'));
    }
    public function destroy($id)
    {
        SearchRecord::where('id',$id)->delete();
        return redirect()->back();
    }
}

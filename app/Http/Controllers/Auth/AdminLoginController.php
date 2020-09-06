<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin'); //allows only admins to enter
    }
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    public function login(Request $request)
    {
        //validate form-data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //return $request->password;
        //$pass=DB::table('admins')->where('email','=',$request->email)->first();
        //return $pass;
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            //return true;
            return redirect()->intended(route('admin.dashboard'));
        }
        return false;
    }
}

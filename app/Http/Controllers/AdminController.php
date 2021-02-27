<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{

  
    public function login()
    {
        return view('admin.login');
    }

    public function adminlogin(Request $request)
    {
        //dd($request->all());
        $email = request('email');
        $password = request('password');

        if (Auth::guard('admin')->attempt(['email'=>$email,'password'=>$password])) {
            
            return redirect('/admin/dasheboard');

        }else{
            return redirect()->back();
        }
    }
    //for logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
        
    }

    public function dasheboard()
    {
        return view('admin.dasheboard');
    }

}


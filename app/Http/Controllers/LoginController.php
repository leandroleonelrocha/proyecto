<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class LoginController extends Controller {


    public function getLogin()
    {
        return view('login');
    }


    public function postLogin(Request $request)
    {
     	dd($request->all());

       if(!Auth::check())
        
        {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                return redirect('home');
            }

            return  redirect()->intended('home');

        }
    }
                // login local

    public function getLogout()
    {
        Auth::logout();

        return redirect('login');
    }

}
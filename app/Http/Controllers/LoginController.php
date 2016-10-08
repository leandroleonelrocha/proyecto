<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;


class LoginController extends Controller {



    public function getLogin()
    {
        return view('login');
    }


    public function postLogin(Request $request)
    {
        return redirect('docentes');
        

       //if(!Auth::check())
        
        //{

            //if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            //{

              //  return redirect('template');
            //}

          //  return redirect()->back()->with('msg_ok', 'El usuario no existe o los datos son incorrectos');
            //return  redirect()->intended('login')->with('msg', 'no se puede ');

        //}

    }
                // login local

    public function getLogout()
    {
        Auth::logout();
        return redirect('login');
    }

}
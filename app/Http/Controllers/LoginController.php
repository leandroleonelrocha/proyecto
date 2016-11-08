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

        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL, "http://laravelprueba.esy.es/laravel/public/cuenta/cuentaLogin/{$request->usuario}/{$request->password}");  
        curl_setopt($ch, CURLOPT_HEADER, false);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        $data = json_decode(curl_exec($ch),true);
        curl_close($ch);
      

       /*$data =[ 
       'id'=>'1',
       'usuario'=>'rochaleandroleonel@gmail.com',
       'password'=>'$2y$10$NrpTswB.eH9ucUQfiBAB.09FyjQLyylbfwaNNDkpe4m0ncRRePDm',
       'rol_id'=>'4',
       'entidad_id'=>'1',
       'habilitado'=>'1'];
        */

        if ($data){
          session(['usuario' => $data]);
          if($data['rol_id'] == 2) // Rol de Dueño
            return redirect()->route('dueño.inicio');
          elseif ($data['rol_id'] == 3) // Rol de Director
            return redirect()->route('director.inicio'); //Pagina de estadisticas
          elseif ($data['rol_id'] == 4) // Rol de Filial
            return redirect()->route('filial.inicio');
        }
        else
          return redirect()->back()->with('msg_error', 'La combinación de Usuario Y Contraseña son incorrectos.');

       // if(!Auth::check())
       //  {
       //      if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password]))
       //      {
       //         return redirect('template');
       //      }
       //      return redirect()->back()->with('msg_ok', 'El usuario no existe o los datos son incorrectos');
       //      return  redirect()->intended('login')->with('msg', 'no se puede ');
       //  }

    }
    
    // login local
    public function getLogout()
    {
        // Auth::logout();
        session()->flush(); // Elimina todos los datos de la session
        return redirect('login');
    }

    public function nueva()
    {
        
        return view('cambio_contrasena',compact('data'));
    }

    public function post_Nueva(Request $request)
    {
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL, "http://laravelprueba.esy.es/laravel/public/cuenta/actualizarCuenta/{$request->mail}/{$request->password}/{$request->passwordActual}");  
        curl_setopt($ch, CURLOPT_HEADER, false);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        $data = json_decode(curl_exec($ch),true);
        curl_close($ch);

        $ds=session('usuario');
        $user=$request->all();

        if ($ds['usuario']==$user['mail']){

          if ($data) 
            return redirect()->route('contrasena.nueva')->with('msg_ok', 'Cambio de contraseña correctamente.');
          else

            return redirect()->route('contrasena.nueva')->with('msg_error', 'La combinación de E-Mail Y Contraseña son incorrectos.');}
        else
          return redirect()->route('contrasena.nueva')->with('msg_error', 'Usuario de sesión no corresponde al mail ingresado');
    }
}
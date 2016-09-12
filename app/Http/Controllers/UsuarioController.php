<?php

namespace App\Http\Controllers;
use Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Hash;
use App\User;

class UsuarioController extends Controller
{

	

	public function index()
	{
		return view('usuarios.index');
	
	}

	public function nuevo()
	{
		return view('usuarios.create');
	}


	public function postNuevo(Request $request)
	{
		User::create($request->all());
		return redirect()->route('auth.login')->with('msg_ok', 'Usuario creado correctamente');

	}

}

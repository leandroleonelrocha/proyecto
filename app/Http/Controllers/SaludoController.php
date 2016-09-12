<?php

namespace App\Http\Controllers;
use Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\User;


class SaludoController extends Controller
{


		public function test2(Request $request)
	{
		$usuario = User::all();
		dd($usuario);

//		$data = $request->input('email');

//		return view('saludo.index', compact('data'));
		//return 'index de prueba';
	}


}
<?php

namespace App\Http\Controllers;
use Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use User;

class PruebaController extends Controller
{

	public function test()
	{
		$data = User::all();

		dd($data);

		$alumno = ['alumno1', 'alumno2', 'alumno3', 'alumno4', 'alumno5'];

		return view('alumnos.index', compact('alumno'));
		//return 'index de prueba';
	}


}

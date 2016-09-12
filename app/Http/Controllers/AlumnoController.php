<?php

namespace App\Http\Controllers;
use Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Hash;

class AlumnoController extends Controller
{

	public function index()
	{

		$alumno = ['alumno1', 'alumno2', 'alumno3', 'alumno4', 'alumno5'];

		return view('alumnos.index', compact('alumno'));
		//return 'index de prueba';
	}

}

<?php

namespace App\Http\Controllers;
use Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use User;
=======
use Hash;
>>>>>>> 09b0eb1467e0070eeafe40e51637b070b4c182bb

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

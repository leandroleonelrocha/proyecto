<?php

namespace App\Http\Controllers;
use Controllers;
use App\Entities\Pago;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\CrearNuevoCursoRequest;
use App\Http\Repositories\FilialRepo;
use App\Http\Repositories\Pago;

class CursoController extends Controller
{
	protected $pagoRepo;

	public function __construct(PagoRepo $pagoRepo)
	{
		$this->pagoRepo = $pagoRepo;
	}
	
	public function lista(){
		if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
	}

	public function nuevo(){
		if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
	}

	public function nuevo_post(CrearNuevoCursoRequest $request){
		if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
	}

  	public function editar($id){
  		if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
    }

    public function editar_post(Request $request){
    	if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
    }

    public function borrar($id){
    	if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
    }
}
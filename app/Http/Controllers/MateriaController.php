<?php

namespace App\Http\Controllers;
use Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\CrearNuevaMateriaRequest;
use App\Http\Repositories\FilialRepo;
use App\Http\Repositories\CursoRepo;
use App\Http\Repositories\DirectorRepo;
use App\Http\Repositories\CarreraRepo;
use App\Http\Repositories\MateriaRepo;


class MateriaController extends Controller
{
	protected $materiaRepo;

	public function __construct(MateriaRepo $materiaRepo, CarreraRepo $carreraRepo)
	{
		$this->materiaRepo = $materiaRepo;
		$this->carreraRepo = $carreraRepo;
	}

	public function index(){
		if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
				$materia=$this->materiaRepo->all();
				return view('materia.index',compact('materia'));
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
	}

	public function  nuevo(){
		if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
				$carreras = $this->carreraRepo->lists('nombre','id');
				return view('materia.alta_materia', compact('carreras'));
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
	}

	public function postAdd(CrearNuevaMateriaRequest $request){
		if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
				//dd($request->all());
				$this->materiaRepo->create($request->all());
		     	return redirect()->route('materia.index')->with('msg_ok', 'Materia creada correctamente');
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
	}

    public function getDelete($id){
    	if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
			    if( $data=$this->materiaRepo->find($id))
			    {
		    	    $data->Delete();
		         	return redirect()->back()->with('msg_ok', 'Materia eliminada correctamente');
		         	}
		        else
		            return redirect()->back()->with('msg_error','La materia no ha podido ser eliminada.');
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
    }

 	public function edit($id){
 		if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
				$carreras = $this->carreraRepo->lists('nombre','id');
		    	$materia = $this->materiaRepo->find($id);
		    	return view('materia.editar',compact('materia','carreras'));
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
    }

    public function postEdit(Request $request){
    	if (null !== session('usuario')){
			if (session('usuario')['rol_id'] == 4){
		        $data = $request->all();
		        $model = $this->materiaRepo->find($data['id']);
		        if($this->materiaRepo->edit($model,$data))
		            return redirect()->route('materia.index')->with('msg_ok','La materia ha sido modificada con éxito');
		        else
		            return redirect()->route('materia.index')->with('msg_error','La materia no ha podido ser modificada.');
			}
		    else
		        return redirect()->back();
		    }
		else
		    return redirect('login');
    }

}
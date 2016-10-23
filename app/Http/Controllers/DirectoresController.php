<?php

namespace App\Http\Controllers;
use Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\Entities\TipoDocumento;
use App\Entities\DirectorMail;
use App\Entities\DirectorTelfono;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\CrearNuevoDirectorRequest;
use App\Http\Repositories\DirectorRepo;
use App\Http\Repositories\DirectorMailRepo;
use App\Http\Repositories\DirectorTelefonoRepo;
use App\Http\Repositories\TipoDocumentoRepo;



class DirectoresController extends Controller
{
	protected $directorRepo;

	public function __construct( DirectorRepo $directorRepo,TipoDocumento $tipoDocumentoRepo, DirectorMailRepo $directorMailRepo, DirectorTelefonoRepo $directorTelefonoRepo){
		$this->directorRepo = $directorRepo;
		$this->tipoDocumentoRepo = $tipoDocumentoRepo;
		$this->directorMailRepo = $directorMailRepo;
		$this->directorTelefonoRepo = $directorTelefonoRepo;
	}

	public function index(){
		return view('rol_director.index');	
	}

	public function lista(){
		$directores=$this->directorRepo->allEneable();
		return view('rol_dueno.directores.lista', compact('directores'));	
	}

	public function nuevo(){
		$tipos = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id');
		return view('rol_dueno.directores.nuevo', compact('tipos'));
	}

<<<<<<< HEAD:app/Http/Controllers/DirectorController.php
	public function postAdd(CrearNuevoDirectorRequest $request)
	{
		$data = $request->all(); 

     	if ( $director = $this->directorRepo->check($data['tipo_documento_id'],$data['nro_documento']))
     	{
        	return redirect()->route('director.index')->with('msg_ok','El director ha sido agregado con éxito');
		}
		else{
    // Si no existe lo crea
	   		if($this->directorRepo->create($data)){
				$director=$this->directorRepo->all()->last();
				$mail['director_id']=$director->id;
				$mail['mail']=$request->mail;
				$this->directorMailRepo->create($mail);

				$telefono['director_id']=$director->id;
				$telefono['telefono']=$request->telefono;
				$this->directorTelefonoRepo->create($telefono);



					  	$ch = curl_init();  
=======
	public function nuevo_post(CrearNuevoDirectorRequest $request){
		$this->directorRepo->create($request->all());
		$director=$this->directorRepo->all()->last();
		$mail['director_id']=$director->id;
		$mail['mail']=$request->mail;
		$this->directorMailRepo->create($mail);

		$telefono['director_id']=$director->id;
		$telefono['telefono']=$request->telefono;
		$this->directorTelefonoRepo->create($telefono);
	  	$ch = curl_init();  
>>>>>>> 9510f1bf21e60fac04ca81ac97b4fa93239b7ffc:app/Http/Controllers/DirectoresController.php
        curl_setopt($ch, CURLOPT_URL, "http://laravelprueba.esy.es/laravel/public/cuenta/cuentaCreate/{$request->mail}/{$director->id}/3");  
        curl_setopt($ch, CURLOPT_HEADER, false);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        $data = json_decode(curl_exec($ch),true);
        curl_close($ch);

<<<<<<< HEAD:app/Http/Controllers/DirectorController.php
	       		return redirect()->route('director.index')->with('msg_ok','El director ha sido agregado con éxito');}
	   		else
	    		return redirect()->route('director.index')->with('msg_error','No se ha podido agregar al director, intente nuevamente.');
			}
	
	//	$this->directorRepo->create($request->all());
	


	//	return redirect()->route('director.index')->with('msg_ok', 'Director creado correctamente');

=======
		return redirect()->route('dueño.directores')->with('msg_ok', 'Director creado correctamente');
>>>>>>> 9510f1bf21e60fac04ca81ac97b4fa93239b7ffc:app/Http/Controllers/DirectoresController.php
	}

    public function borrar($id){
       	if($this->directorRepo->disable($this->directorRepo->find($id)))
         	return redirect()->back()->with('msg_ok', 'Director eliminado correctamente');
    	else
            return redirect()->back()->with('msg_error','El director no ha podido ser eliminado.');
    }

  	public function editar($id){
    	$director = $this->directorRepo->find($id);
    	$tipos = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id_tipo_documento');
    	return view('rol_dueno.directores.editar',compact('director','tipos'));
    }

    public function editar_post(Request $request){
        $data = $request->all();
        $model = $this->directorRepo->find($data['id']);
        if($this->directorRepo->edit($model,$data))
            return redirect()->route('dueño.directores')->with('msg_ok','El director ha sido modificado con éxito');
        else
            return redirect()->route('dueño.directores')->with('msg_error','El director no ha podido ser modificado.');
    }


}
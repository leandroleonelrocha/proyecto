<?php

namespace App\Http\Controllers;
use Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use App\Entities\TipoDocumento;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Repositories\DirectorRepo;
use App\Http\Repositories\TipoDocumentoRepo;



class DirectorController extends Controller
{
	protected $directorRepo;

	public function __construct( DirectorRepo $directorRepo,TipoDocumento $tipoDocumentoRepo)
	{
		$this->directorRepo = $directorRepo;
		$this->tipoDocumentoRepo = $tipoDocumentoRepo;

	}

	public function index()
	{
	
		$directores=$this->directorRepo->all();

		return view('director.index',compact('directores'));	
	}

	public function  nuevo()
	{

		$tipos = $this->tipoDocumentoRepo->all()->lists('tipo_documento','tipo_documento_id');
		return view('director.alta_director', compact('tipos'));
		
	}

	public function postAdd(Request $request)
	{
	
	//	dd($request->all());
		$this->directorRepo->create($request->all());
		return redirect()->route('director.index')->with('msg_ok', 'Director creado correctamente');

	}

    public function getDelete($id)
    {
	    if( $data=$this->directorRepo->find($id))
	    {
    	    $data->Delete();
         	return redirect()->back()->with('msg_ok', 'Director eliminado correctamente');
         	}
        else
            return redirect()->back()->with('msg_error','El director no ha podido ser eliminado.');
    }

  	public function edit($id){
    	$director = $this->directorRepo->find($id);
    	$tipos = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id_tipo_documento');
    	return view('director.editar',compact('director','tipos'));
    }

    public function postEdit(Request $request){
        $data = $request->all();
        $model = $this->directorRepo->find($data['id']);
        if($this->directorRepo->edit($model,$data))
            return redirect()->route('director.index')->with('msg_ok','El director ha sido modificado con éxito');
        else
            return redirect()->route('director.index')->with('msg_error','El director no ha podido ser modificado.');
    }


}
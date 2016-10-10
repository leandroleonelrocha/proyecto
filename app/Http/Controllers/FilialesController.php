<?php

namespace App\Http\Controllers;
use Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Repositories\FilialRepo;
use App\Http\Repositories\DirectorRepo;



class FilialesController extends Controller
{
	protected $filialesRepo;
	protected $directorRepo;

	public function __construct(FilialRepo $filialesRepo, DirectorRepo $directorRepo)
	{
		$this->directorRepo = $directorRepo;
		$this->filialesRepo = $filialesRepo;
	}


	public function index()
	{
	

	$filiales=$this->filialesRepo->all();

	return view('filiales.index',compact('filiales'));
		
	}

	public function  nuevo()
	{

	$directores = $this->directorRepo->lists('nombres','id');

	return view('filiales.alta_filiales', compact('directores'));
		
	}

	public function postAdd(Request $request)
	{
	

		$this->filialesRepo->create($request->all());
		return redirect()->route('filiales.index')->with('msg_ok', 'Filial creada correctamente.');

	}

    public function getDelete($id)
    {
	    if( $data=$this->filialesRepo->find($id))
	    {
    	    $data->Delete();
         	return redirect()->back()->with('msg_ok', 'Filial eliminada correctamente.');
         	}
        else
            return redirect()->back()->with('msg_error','La filial no ha podido ser eliminada.');
    }

    public function edit($id){
    	$directores = $this->directorRepo->lists('nombres','id');
    	$filial = $this->filialesRepo->find($id);
    	return view('filiales.editar',compact('filial','directores'));
    }

    public function postEdit(Request $request){
        $data = $request->all();
        $model = $this->filialesRepo->find($data['id']);
        if($this->filialesRepo->edit($model,$data))
            return redirect()->route('filiales.index')->with('msg_ok','La filial ha sido modificada con éxito');
        else
            return redirect()->route('filiales.index')->with('msg_error','La filial no ha podido ser modificada.');
    }


}
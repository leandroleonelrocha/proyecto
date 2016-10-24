<?php

namespace App\Http\Controllers;
use Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Repositories\CursoRepo;
use App\Http\Repositories\CarreraRepo;
use App\Http\Repositories\MateriaRepo;
use App\Http\Repositories\DocenteRepo;
use App\Http\Repositories\GrupoRepo;
use App\Http\Repositories\ClaseRepo;
use App\Entities\Clase;


class GrupoController extends Controller
{
	protected $cursoRepo;
	protected $carreraRepo;
	protected $materiaRepo;
	protected $docenteRepo;
	protected $grupoRepo;
	protected $claseRepo;

	public function __construct(CursoRepo $cursoRepo, CarreraRepo $carreraRepo, MateriaRepo $materiaRepo, DocenteRepo $docenteRepo, GrupoRepo $grupoRepo, ClaseRepo $claseRepo )
	{
		$this->cursoRepo = $cursoRepo;
		$this->carreraRepo = $carreraRepo;
		$this->materiaRepo = $materiaRepo;
		$this->docenteRepo = $docenteRepo;
		$this->grupoRepo = $grupoRepo;
		$this->claseRepo = $claseRepo;
		
	}	


	public function index()
	{
		$grupos = $this->grupoRepo->allEneable();
	
		return view('rol_filial.grupos.index', compact('grupos'));
	}

	public function nuevo()
	{
		$cursos = $this->cursoRepo->lists('nombre', 'id');

		$carreras = $this->carreraRepo->lists('nombre','id');
		$materias =  $this->materiaRepo->lists('nombre','id');
		$docentes = $this->docenteRepo->all()->lists('apellidos', 'id');

	
		return view('rol_filial.grupos.form', compact('cursos', 'carreras', 'materias','docentes'));
	}

	public function postAdd(Request $request)
	{
		//$data  = $request->only('curso_id', 'carrera_id', 'materia_id', 'descripcion', 'docente_id');
		$data = $request->all();
		$array = explode("-", $request->get('fecha'));
	
		$data['fecha_inicio'] = date("Y-m-d", strtotime($array[0]));
		$data['fecha_fin'] = date("Y-m-d", strtotime($array[1]));
		$data['filial_id'] = session('usuario')['entidad_id'];

		$this->grupoRepo->create($data);
		return redirect()->route('rol_filial.grupos.index')->with('msg_ok', 'Grupo creado correctamente');

	}

	public function clases()
	{
		$grupos = $this->grupoRepo->lists('descripcion', 'id');
		
		return view('rol_filial.grupos.clases', compact('grupos'));
	}


	public function clase_matricula()
	{
		return view('rol_filial.grupos.clase_matricula');
	}


	public function process(Request $request)
	{
		
		$type = $request->get('type');

		if($type == 'new')
		{
			$data = $request->all();
			$this->claseRepo->create($data);
		
			echo json_encode(array('status'=>'success'));
		}

		if($type == 'changetitle')
		{
			$eventid = $request->get('eventid');
			return redirect()->route('rol_filial.grupos.clase_matricula');
		
		}

		if($type == 'resetdate')
		{
			$title = $_POST['title'];
			$startdate = $_POST['start'];
			$enddate = $_POST['end'];
			$eventid = $_POST['eventid'];
			$update = mysqli_query($con,"UPDATE calendar SET title='$title', startdate = '$startdate', enddate = '$enddate' where id='$eventid'");
			if($update)
				echo json_encode(array('status'=>'success'));
			else
				echo json_encode(array('status'=>'failed'));
		}

		if($type == 'remove')
		{
			$clase_id = $request->get('eventid');


			$delete = $this->claseRepo->find($clase_id)->delete();
			if($delete)
				echo json_encode(array('status'=>'success'));
			else
				echo json_encode(array('status'=>'failed'));
		}

		if($type == 'fetch')
		{


			$events = array();
			$query = $this->claseRepo->all();
	

			foreach ($query as $fetch) {
			  // Do work here
				$e = array();
			    $e['id'] = $fetch['id'];
			    $e['title'] = $fetch['descripcion'];
			    $e['start'] = $fetch['fecha'];
			   // $e['end'] = $fetch['enddate'];
			   // $allday = ($fetch['allDay'] == "true") ? true : false;
			   // $e['allDay'] = $allday;


			    array_push($events, $e);
			}	

			echo json_encode($events);
			
		}

	}

}

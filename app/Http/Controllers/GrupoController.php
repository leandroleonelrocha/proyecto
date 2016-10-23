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
use App\Entities\Calendar;


class GrupoController extends Controller
{
	protected $cursoRepo;
	protected $carreraRepo;
	protected $materiaRepo;
	protected $docenteRepo;
	protected $grupoRepo;

	public function __construct(CursoRepo $cursoRepo, CarreraRepo $carreraRepo, MateriaRepo $materiaRepo, DocenteRepo $docenteRepo, GrupoRepo $grupoRepo )
	{
		$this->cursoRepo = $cursoRepo;
		$this->carreraRepo = $carreraRepo;
		$this->materiaRepo = $materiaRepo;
		$this->docenteRepo = $docenteRepo;
		$this->grupoRepo = $grupoRepo;
		
	}	


	public function index()
	{
		$grupos = $this->grupoRepo->allEneable();
	
		return view('grupos.index', compact('grupos'));
	}

	public function nuevo()
	{
		$cursos = $this->cursoRepo->lists('nombre', 'id');
		$carreras = $this->carreraRepo->lists('nombre','id');
		$materias =  $this->materiaRepo->lists('nombre','id');
		$docentes = $this->docenteRepo->all()->lists('full_name', 'id');
	
		return view('grupos.form', compact('cursos', 'carreras', 'materias','docentes'));
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
		return redirect()->route('grupos.index')->with('msg_ok', 'Grupo creado correctamente');

	}

	public function clases()
	{
		return view('grupos.clases');
	}

	public function process(Request $request)
	{
		
		$type = $request->get('type');

		if($type == 'new')
		{
			$startdate = $_POST['startdate'].'+'.$_POST['zone'];
			$title = $_POST['title'];
			$insert = mysqli_query($con,"INSERT INTO calendar(`title`, `startdate`, `enddate`, `allDay`) VALUES('$title','$startdate','$startdate','false')");
			$lastid = mysqli_insert_id($con);
			echo json_encode(array('status'=>'success','eventid'=>$lastid));
		}

		if($type == 'changetitle')
		{
			$eventid = $_POST['eventid'];
			$title = $_POST['title'];
			$update = mysqli_query($con,"UPDATE calendar SET title='$title' where id='$eventid'");
			if($update)
				echo json_encode(array('status'=>'success'));
			else
				echo json_encode(array('status'=>'failed'));
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
			$eventid = $_POST['eventid'];
			
			$delete = mysqli_query($con,"DELETE FROM calendar where id='$eventid'");
			if($delete)
				echo json_encode(array('status'=>'success'));
			else
				echo json_encode(array('status'=>'failed'));
		}

		if($type == 'fetch')
		{


			$events = array();
			$query = Calendar::all();
			foreach ($query as $fetch) {
			  // Do work here
				$e = array();
			    $e['id'] = $fetch['id'];
			    $e['title'] = $fetch['title'];
			    $e['start'] = $fetch['startdate'];
			    $e['end'] = $fetch['enddate'];

			    $allday = ($fetch['allDay'] == "true") ? true : false;
			    $e['allDay'] = $allday;


			    array_push($events, $e);
			}	

			echo json_encode($events);
			
		}

	}

}

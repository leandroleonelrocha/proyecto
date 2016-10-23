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


}

<?php

namespace App\Http\Controllers;

use App\Entities\PersonaTelefono;
use App\Entities\PersonaInteres;
use App\Entities\TipoDocumento;
use App\Entities\PersonaMail;
use App\Entities\Preinforme;
use App\Entities\Persona;
use App\Entities\Carrera;
use App\Entities\Asesor;
use App\Entities\Curso;
use App\Http\Repositories\PersonaTelefonoRepo;
use App\Http\Repositories\PersonaInteresRepo;
use App\Http\Repositories\TipoDocumentoRepo;
use App\Http\Repositories\PersonaMailRepo;
use App\Http\Repositories\PreinformeRepo;
use App\Http\Repositories\PersonaRepo;
use App\Http\Repositories\CarreraRepo;
use App\Http\Repositories\InteresRepo;
use App\Http\Repositories\AsesorRepo;
use App\Http\Repositories\CursoRepo;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PreinformeController extends Controller {

	protected $preinformeRepo;

	public function __construct(PreinformeRepo $preinformeRepo, PersonaRepo $personaRepo, AsesorRepo $asesorRepo, TipoDocumento $tipoDocumentoRepo, PersonaMail $personaMailRepo, PersonaTelefono $personaTelefonoRepo, CarreraRepo $carreraRepo, CursoRepo $cursoRepo, PersonaInteresRepo $personaInteresRepo)
	{
		$this->preinformeRepo       = $preinformeRepo;
		$this->personaRepo          = $personaRepo;
        $this->asesorRepo           = $asesorRepo;
        $this->tipoDocumentoRepo    = $tipoDocumentoRepo;
        $this->personaEmailRepo     = $personaMailRepo;
        $this->personaTelefonoRepo  = $personaTelefonoRepo;
        $this->carreraRepo          = $carreraRepo;
        $this->cursoRepo            = $cursoRepo;
        $this->personaInteresRepo   = $personaInteresRepo;
	}

    // Página principal de Preinformes
    public function index(){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
            	$preinformes = $this->preinformeRepo->allFilial();
                return view('preinformes.index',compact('preinformes'));
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    // Selección de Persona nueva o Existente
    public function seleccion(){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                $personas = $this->personaRepo->getPersonasFilial();
                return view('preinformes.seleccion',compact('personas'));
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    // Página de Nuevo -- Persona Existente
    public function add($id){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                $persona    = $this->personaRepo->find($id);
                $asesores   = $this->asesorRepo->all()->lists('full_name','id');
                $carreras   = $this->carreraRepo->all()->lists('nombre','id');
                $cursos     = $this->cursoRepo->all()->lists('nombre','id');
                return view('preinformes.nuevo',compact('persona','asesores','carreras','cursos'));
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    // Página de Nuevo -- Persona Nueva
    public function addNuevaPersona(){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                $tipos      = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id');
                $asesores   = $this->asesorRepo->all()->lists('full_name','id');
                $carreras   = $this->carreraRepo->all()->lists('nombre','id');
                $cursos     = $this->cursoRepo->all()->lists('nombre','id');
                return view('preinformes.nuevoPersona',compact('tipos','asesores','carreras','cursos'));
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    // Alta de Preinforme y Persona Existente
    public function postAdd(Request $request){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                // Datos Preinforme
                $preinforme['persona_id']       =   $request->persona;
                $preinforme['asesor_id']        =   $request->asesor;
                $preinforme['descripcion']      =   $request->descripcion_preinforme;
                $preinforme['medio']            =   $request->medio;
                $preinforme['como_encontro']    =   $request->como_encontro;
                $preinforme['filial_id']        =   session('usuario')['entidad_id'];
                if($this->preinformeRepo->create($preinforme)){
                    // Intereces
                    $preinforme                 =   $this->preinformeRepo->all()->last();
                    $interes['preinforme_id']   =   $preinforme['id'];
                    $interes['persona_id']      =   $request->persona;
                    $interes['descripcion']     =   $request->descripcion_interes;

                    if ($interes['descripcion'] !== null){
                            $this->personaInteresRepo->create($interes);
                            $interes['descripcion']     =   null;
                        }

                    if (null !== $request->carrera){ //Si se selecciona una carrera
                        if (count($request->carrera)>1) {
                            foreach ($request->carrera as $carrera) {
                                $interes['carrera_id'] = $carrera;
                                $this->personaInteresRepo->create($interes);
                            }
                        }
                        else{
                            $interes['carrera_id'] = $request->carrera;
                            $this->personaInteresRepo->create($interes);
                        }
                        $interes['carrera_id']   =   null;
                    }
                    if (null !== $request->curso){ //Si se selecciona un curso
                        if (count($request->curso)>1) {
                            foreach ($request->curso as $curso) {
                                $interes['curso_id'] = $curso;
                                $this->personaInteresRepo->create($interes);
                            }
                        }
                        else{
                            $interes['curso_id'] = $request->curso;
                            $this->personaInteresRepo->create($interes);
                        }
                        $interes['curso_id'] = null;
                    }

                    return redirect()->route('preinformes.index');
                }
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    // Alta de Preinforme y Persona Nueva
    public function postAddPersona(Request $request){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                // Datos Persona
                $persona['tipo_documento_id']       =   $request->tipo_documento;
                $persona['nro_documento']           =   $request->nro_documento;
                $persona['nombres']                 =   $request->nombres;
                $persona['apellidos']               =   $request->apellidos;
                $persona['genero']                  =   $request->genero;
                $persona['fecha_nacimiento']        =   $request->fecha_nacimiento;
                $persona['domicilio']               =   $request->domicilio;
                $persona['localidad']               =   $request->localidad;
                $persona['estado_civil']            =   $request->estado_civil;
                $persona['nivel_estudios']          =   $request->nivel_estudios;
                $persona['estudio_computacion']     =   $request->estudio_computacion;
                $persona['posee_computadora']       =   $request->posee_computadora;
                $persona['disponibilidad_manana']   =   $request->disponibilidad_manana;
                $persona['disponibilidad_tarde']    =   $request->disponibilidad_tarde;
                $persona['disponibilidad_noche']    =   $request->disponibilidad_noche;
                $persona['disponibilidad_sabados']  =   $request->disponibilidad_sabados;
                $persona['aclaraciones']            =   $request->aclaraciones;
                $persona['filial_id']               =   session('usuario')['entidad_id'];
                $persona['asesor_id']               =   $request->asesor;
                if($this->personaRepo->create($persona)){
                    //Datos Telefónicos y Mails
                    $persona                        =   $this->personaRepo->all()->last();
                    $email['persona_id']            =   $persona['id'];
                    $email['mail']                  =   $request->mail;
                    $this->personaEmailRepo->create($email);
                    $telefono['persona_id']         =   $persona['id'];
                    $telefono['telefono']           =   $request->telefono;
                    $this->personaTelefonoRepo->create($telefono);
                    // Datos Preinforme
                    $preinforme['persona_id']       =   $persona['id'];
                    $preinforme['asesor_id']        =   $request->asesor;
                    $preinforme['descripcion']      =   $request->descripcion_preinforme;
                    $preinforme['medio']            =   $request->medio;
                    $preinforme['como_encontro']    =   $request->como_encontro;
                    $preinforme['filial_id']        =   session('usuario')['entidad_id'];
                    if($this->preinformeRepo->create($preinforme)){
                        // Intereces
                        $preinforme                 =   $this->preinformeRepo->all()->last();
                        $interes['preinforme_id']   =   $preinforme['id'];
                        $interes['persona_id']      =   $persona['id'];
                        $interes['descripcion']     =   $request->descripcion_interes;

                        if ($request->carrera == null && $request->curso == null){
                            $this->personaInteresRepo->create($interes);
                            $interes['descripcion']     =   null;
                        }

                        if (null !== $request->carrera){ //Si se selecciona una carrera
                            if (count($request->carrera)>1) {
                                foreach ($request->carrera as $carrera) {
                                    $interes['carrera_id'] = $carrera;
                                    $this->personaInteresRepo->create($interes);
                                }
                            }
                            else{
                                $interes['carrera_id'] = $request->carrera;
                                $this->personaInteresRepo->create($interes);
                            }
                            $interes['carrera_id']      =   null;
                        }
                        if (null !== $request->curso){ //Si se selecciona un curso
                            if (count($request->curso)>1) {
                                foreach ($request->curso as $curso) {
                                    $interes['curso_id'] = $curso;
                                    $this->personaInteresRepo->create($interes);
                                }
                            }
                            else{
                                $interes['curso_id'] = $request->curso;
                                $this->personaInteresRepo->create($interes);
                            }
                        }
                        return redirect()->route('preinformes.index');
                    }
                }
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
                $preinforme = $this->preinformeRepo->find($id);
                $intereses  = $this->personaInteresRepo->findPreinforme($preinforme->id);
                $asesores   = $this->asesorRepo->all()->lists('full_name','id');
                $carreras   = $this->carreraRepo->all();
                $cursos     = $this->cursoRepo->all();
                return view('preinformes.editar',compact('preinforme','intereses','asesores','carreras','cursos'));
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
                $data                           = $request->all();
                $data['filial_id']              = session('usuario')['entidad_id'];
                // Datos del Preinforme
                $preinforme['asesor_id']        = $data['asesor'];
                $preinforme['descripcion']      = $data['descripcion_preinforme'];
                $preinforme['medio']            = $data['medio'];
                $preinforme['como_encontro']    = $data['como_encontro'];

                $modelP = $this->preinformeRepo->find($data['preinforme']); // Busco el preinforme
                // Modificación de los datos del preinforme
                $this->docenteRepo->edit($modelP,$preinforme); 
                // Intereces
                $modelI = $this->personaInteresRepo->findPreinforme($data['preinforme']);
                foreach ($modelI as $mI) { $mI->delete(); }
                $interes['preinforme_id']   =   $data['preinforme'];
                $interes['persona_id']      =   $modelP->persona_id;
                if ( isset($data['ninguna']) ){
                    $interes['descripcion']     =   $data['descripcion_interes'];
                    $this->personaInteresRepo->create($interes);
                }
                else{
                    for ($i=0; $i < count($data['curso']); $i++) {
                        $interes['curso_id'] = $data['curso'][0];
                        $this->personaInteresRepo->create($interes);
                    }
                    $interes['curso_id']     =   null;
                    for ($i=0; $i < count($data['carrera']); $i++) {
                        $interes['carrera_id'] = $data['carrera'][0];
                        $this->personaInteresRepo->create($interes);
                    }
                    $interes['carrera_id']     =   null;
                }
                return redirect()->route('preinformes.index');
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }
}
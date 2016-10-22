<?php

namespace App\Http\Controllers;

use App\Entities\PersonaTelefono;
use App\Entities\TipoDocumento;
use App\Entities\PersonaMail;
use App\Entities\Matricula;
use App\Entities\Persona;
use App\Entities\Carrera;
use App\Entities\Asesor;
use App\Entities\Curso;
use App\Entities\Pago;
use App\Http\Repositories\PersonaTelefonoRepo;
use App\Http\Repositories\TipoDocumentoRepo;
use App\Http\Repositories\PersonaMailRepo;
use App\Http\Repositories\MatriculaRepo;
use App\Http\Repositories\PersonaRepo;
use App\Http\Repositories\CarreraRepo;
use App\Http\Repositories\InteresRepo;
use App\Http\Repositories\AsesorRepo;
use App\Http\Repositories\CursoRepo;
use App\Http\Repositories\PagoRepo;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class MatriculaController extends Controller {

	protected $matriculaRepo;

	public function __construct(MatriculaRepo $matriculaRepo, PersonaRepo $personaRepo, AsesorRepo $asesorRepo, TipoDocumento $tipoDocumentoRepo, PersonaMail $personaMailRepo, PersonaTelefono $personaTelefonoRepo, CarreraRepo $carreraRepo, CursoRepo $cursoRepo, PagoRepo $pagoRepo)
	{
		$this->matriculaRepo        = $matriculaRepo;
		$this->personaRepo          = $personaRepo;
        $this->asesorRepo           = $asesorRepo;
        $this->tipoDocumentoRepo    = $tipoDocumentoRepo;
        $this->personaEmailRepo     = $personaMailRepo;
        $this->personaTelefonoRepo  = $personaTelefonoRepo;
        $this->carreraRepo          = $carreraRepo;
        $this->cursoRepo            = $cursoRepo;
        $this->pagoRepo             = $pagoRepo;
	}

    // Página principal de Matrículas
    public function lista(){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
            	$matriculas = $this->matriculaRepo->allEneable();
                return view('rol_filial.matricula.lista',compact('matriculas'));
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
                return view('rol_filial.matricula.seleccion',compact('personas'));
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    // Página de Nuevo -- Persona Existente
    public function nuevo($id){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                $persona    = $this->personaRepo->find($id);
                $asesores   = $this->asesorRepo->all()->lists('full_name','id');
                $carreras   = $this->carreraRepo->all()->lists('nombre','id');
                $cursos     = $this->cursoRepo->all()->lists('nombre','id');
                return view('rol_filial.matricula.nuevo',compact('persona','asesores','carreras','cursos'));
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    // Página de Nuevo -- Persona Nueva
    public function nuevaPersona(){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                $tipos      = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id');
                $asesores   = $this->asesorRepo->all()->lists('full_name','id');
                $carreras   = $this->carreraRepo->all();
                $cursos     = $this->cursoRepo->all();
                return view('rol_filial.matricula.nuevoPersona',compact('tipos','asesores','carreras','cursos'));
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    // Alta de Preinforme y Persona Existente
    public function nuevo_post(Request $request){
        // if (null !== session('usuario')){
        //     if (session('usuario')['rol_id'] == 4){
        //         // Datos Preinforme
        //         $preinforme['persona_id']       =   $request->persona;
        //         $preinforme['asesor_id']        =   $request->asesor;
        //         $preinforme['descripcion']      =   $request->descripcion_preinforme;
        //         $preinforme['medio']            =   $request->medio;
        //         $preinforme['como_encontro']    =   $request->como_encontro;
        //         $preinforme['filial_id']        =   session('usuario')['entidad_id'];
        //         if($this->preinformeRepo->create($preinforme)){
        //             // Intereces
        //             $preinforme                 =   $this->preinformeRepo->all()->last();
        //             $interes['preinforme_id']   =   $preinforme['id'];
        //             $interes['persona_id']      =   $request->persona;
        //             $interes['descripcion']     =   $request->descripcion_interes;

        //             if ($interes['descripcion'] !== null){
        //                     $this->personaInteresRepo->create($interes);
        //                     $interes['descripcion']     =   null;
        //                 }

        //             if (null !== $request->carrera){ //Si se selecciona una carrera
        //                 if (count($request->carrera)>1) {
        //                     foreach ($request->carrera as $carrera) {
        //                         $interes['carrera_id'] = $carrera;
        //                         $this->personaInteresRepo->create($interes);
        //                     }
        //                 }
        //                 else{
        //                     $interes['carrera_id'] = $request->carrera;
        //                     $this->personaInteresRepo->create($interes);
        //                 }
        //                 $interes['carrera_id']   =   null;
        //             }
        //             if (null !== $request->curso){ //Si se selecciona un curso
        //                 if (count($request->curso)>1) {
        //                     foreach ($request->curso as $curso) {
        //                         $interes['curso_id'] = $curso;
        //                         $this->personaInteresRepo->create($interes);
        //                     }
        //                 }
        //                 else{
        //                     $interes['curso_id'] = $request->curso;
        //                     $this->personaInteresRepo->create($interes);
        //                 }
        //                 $interes['curso_id'] = null;
        //             }

        //             return redirect()->route('preinformes.index');
        //         }
        //     }
        //     else
        //         return redirect()->back();
        //     }
        // else
        //     return redirect('login');
    }

    // Alta de Preinforme y Persona Nueva
    public function nuevaPersona_post(Request $request){
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
                    // Datos Matrícula
                    $matricula['persona_id']       =   $persona['id'];
                    //Determinar si se seleccionó un Curso o Carrera
                    $data = explode(';',$request->carreras_cursos);
                    if ($data[0] == 'carrera')
                        $matricula['carrera_id']    =   $data[1];
                    elseif ($data[0] == 'curso')
                        $matricula['curso_id']      =   $data[1];

                    $matricula['filial_id']         =   session('usuario')['entidad_id'];
                    $matricula['asesor_id']         =   $request->asesor;
                    if($this->matriculaRepo->create($matricula)){
                        // Pagos
                        $matricula                  =   $this->matriculaRepo->all()->last();
                        $pago['matricula_id']       =   $matricula['id'];
                        for ($i=0; $i < count($request->nro_pago); $i++){
                            $pago['nro_pago']       =   $request->nro_pago[$i];
                            $pago['descripcion']    =   $request->descripcion[$i];
                            $pago['vencimiento']    =   $request->vencimiento[$i];
                            $pago['monto_original'] =   $request->monto_original[$i];
                            $pago['recargo']        =   $request->recargo[$i];
                            $pago['filial_id']      =   session('usuario')['entidad_id'];
                            $this->pagoRepo->create($pago);
                        }
                        return redirect()->route('filial.matriculas');
                    }
                }
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
                // $matirucla  = $this->matriculaRepo->find($id);
                // $intereses  = $this->personaInteresRepo->findPreinforme($preinforme->id);
                // $asesores   = $this->asesorRepo->all()->lists('full_name','id');
                // $carreras   = $this->carreraRepo->all();
                // $cursos     = $this->cursoRepo->all();
                // return view('rol_filial.matriculas.editar',compact('preinforme','intereses','asesores','carreras','cursos'));
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    public function editar_post(Request $request){
        // if (null !== session('usuario')){
        //     if (session('usuario')['rol_id'] == 4){
        //         $data                           = $request->all();
        //         $data['filial_id']              = session('usuario')['entidad_id'];
        //         // Datos del Preinforme
        //         $preinforme['asesor_id']        = $data['asesor'];
        //         $preinforme['descripcion']      = $data['descripcion_preinforme'];
        //         $preinforme['medio']            = $data['medio'];
        //         $preinforme['como_encontro']    = $data['como_encontro'];

        //         $modelP = $this->preinformeRepo->find($data['preinforme']); // Busco el preinforme
        //         // Modificación de los datos del preinforme
        //         $this->docenteRepo->edit($modelP,$preinforme); 
        //         // Intereces
        //         $modelI = $this->personaInteresRepo->findPreinforme($data['preinforme']);
        //         foreach ($modelI as $mI) { $mI->delete(); }
        //         $interes['preinforme_id']   =   $data['preinforme'];
        //         $interes['persona_id']      =   $modelP->persona_id;
        //         if ( isset($data['ninguna']) ){
        //             $interes['descripcion']     =   $data['descripcion_interes'];
        //             $this->personaInteresRepo->create($interes);
        //         }
        //         else{
        //             for ($i=0; $i < count($data['curso']); $i++) {
        //                 $interes['curso_id'] = $data['curso'][0];
        //                 $this->personaInteresRepo->create($interes);
        //             }
        //             $interes['curso_id']     =   null;
        //             for ($i=0; $i < count($data['carrera']); $i++) {
        //                 $interes['carrera_id'] = $data['carrera'][0];
        //                 $this->personaInteresRepo->create($interes);
        //             }
        //             $interes['carrera_id']     =   null;
        //         }
        //         return redirect()->route('preinformes.index');
        //     }
        //     else
        //         return redirect()->back();
        //     }
        // else
        //     return redirect('login');
    }

    // Borrado lógico de la Matrícula
    public function borrar($id){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                if($this->matriculaRepo->disable($this->matriculaRepo->find($id)))
                    return redirect()->route('filial.matriculas')->with('msg_ok','Matrícula eliminado correctamente');
                else
                    return redirect()->route('filial.matriculas')->with('msg_error',' La Matrícula no ha podido ser eliminado.');
            }
            else
                return redirect()->back();   
        }
        else
            return redirect('login');
    }
}
<?php

namespace App\Http\Controllers;

use App\Entities\TipoDocumento;
use App\Entities\Preinforme;
use App\Entities\Persona;
use App\Entities\Asesor;
use App\Http\Repositories\TipoDocumentoRepo;
use App\Http\Repositories\PreinformeRepo;
use App\Http\Repositories\PersonaRepo;
use App\Http\Repositories\AsesorRepo;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PreinformeController extends Controller {

	protected $preinformeRepo;

	public function __construct(PreinformeRepo $preinformeRepo, PersonaRepo $personaRepo, AsesorRepo $asesorRepo, TipoDocumento $tipoDocumentoRepo)
	{
		$this->preinformeRepo       = $preinformeRepo;
		$this->personaRepo          = $personaRepo;
        $this->asesorRepo           = $asesorRepo;
        $this->tipoDocumentoRepo    = $tipoDocumentoRepo;
	}

    // Página principal de Preinformes
    public function index(){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
            	$preinformes = $this->preinformeRepo->all();
                return view('preinformes.index',compact('preinformes'));
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    // Página de Nuevo
    public function add(){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                $tipos = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id');
                return view('preinformes.nuevo',compact('tipos'));
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    // Alta de Preinforme y Persona
    public function postAdd(Request $request){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                // Datos Persona
                $persona['tipo_documento_id']       =   $request->tipo_documento;
                $persona['nro_documento']           =   $request->nro_documento;
                $persona['nombres']                 =   $request->nombres;
                $persona['apellidos']               =   $request->apellidos;
                $persona['genero']                  =   $request->genero;
                $persona['fecha_nacimiento']        =   $request->fecha_nacimiento;
                $persona['docimicilio']             =   $request->docimicilio;
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
                // $persona['filial_id']               =   ;
                // Falta datos telefonicos
                // Datos Preinforme
                // $preinforme['persona_id']           =   ;
                // $preinforme['asesor_id']            =   ;
                $preinforme['descripcion']          =   $request->descripcion;
                $preinforme['medio']                =   $request->medio;
                $preinforme['como_encontro']        =   $request->como_encontro;
                // $preinforme['filial_id']            =   ;
                // Intereces
                //$interes['persona_id']
            }
            else
                return redirect()->back();
            }
        else
            return redirect('login');
    }

    // public function delete($id){
        // if (null !== session('usuario')){
        //     if (session('usuario')['rol_id'] == 4){
        //     }
        //     else
        //         return redirect()->back();
        //     }
        // else
        //     return redirect('login');
    // }

    // public function edit($id){
        // if (null !== session('usuario')){
        //     if (session('usuario')['rol_id'] == 4){
        //     }
        //     else
        //         return redirect()->back();
        //     }
        // else
        //     return redirect('login');
    // }

    // public function postEdit(Request $request){
        // if (null !== session('usuario')){
        //     if (session('usuario')['rol_id'] == 4){
        //     }
        //     else
        //         return redirect()->back();
        //     }
        // else
        //     return redirect('login');
    // }
}
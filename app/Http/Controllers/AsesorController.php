<?php
namespace App\Http\Controllers;
use App\Entities\Asesor;
use App\Entities\TipoDocumento;
use App\Entities\AsesorMail;
use App\Entities\AsesorTelefono;
use App\Entities\AsesorFilial;
use App\Http\Repositories\AsesorRepo;
use App\Http\Repositories\AsesorMailRepo;
use App\Http\Repositories\AsesorTelefonoRepo;
use App\Http\Repositories\AsesorFilialRepo;
use App\Http\Repositories\FilialRepo;
use App\Http\Repositories\TipoDocumentoRepo;
use App\Http\Requests\CrearNuevoAsesorRequest;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
class AsesorController extends Controller {

	protected $asesorRepo;
	
    public function __construct(AsesorRepo $asesorRepo, TipoDocumento $tipoDocumentoRepo, AsesorMailRepo $asesorMailRepo, AsesorTelefonoRepo $asesorTelefonoRepo,AsesorFilialRepo $asesorFilialRepo)
	{
		$this->asesorRepo        = $asesorRepo;
		$this->tipoDocumentoRepo  = $tipoDocumentoRepo;
        $this->asesorMailRepo  = $asesorMailRepo;
        $this->asesorTelefonoRepo  = $asesorTelefonoRepo;
        $this->asesorFilialRepo  = $asesorFilialRepo;


	}

    // Página principal de Acesor
    public function index(){

        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                $asesor = $this->asesorRepo->allEneable(); // Obtención de todos los Acesores activos
                return view('asesor.index',compact('asesor'));
            }
            else
                return redirect()->back();
        }
        else
            return redirect('login');
    }

    // Página de Nuevo
    public function nuevo(){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
            	$tipos = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id');
            	return view('asesor.alta_asesor',compact('tipos'));
            }
            else
                return redirect()->back();
        }
        else
            return redirect('login');
    }

    // Alta Asesor
    public function postAdd(CrearNuevoAsesorRequest $request){
       
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
            	$data = $request->all(); // Obtengo todos los datos del formulario
                
                // Corroboro que el asesor exista, si exite lo activa
                if ( $asesor = $this->asesorRepo->check($data['tipo_documento_id'],$data['nro_documento']) ) {
                        return redirect()->route('asesor.index')->with('msg_ok','El asesor ha sido agregado con éxito');
                }
                else{
                    // Si no existe lo crea
                    if($this->asesorRepo->create($data)){


                        $asesor=$this->asesorRepo->all()->last();

                        $f = session('usuario')['entidad_id'];
                        $filial['asesor_id']=$asesor->id;
                        $filial['filial_id']=$f;
                        $this->asesorFilialRepo->create($filial);

                        $mail['asesor_id']=$asesor->id;
                        $mail['mail']=$request->mail;
                        $this->asesorMailRepo->create($mail);

                        $telefono['asesor_id']=$asesor->id;
                        $telefono['telefono']=$request->telefono;
                        $this->asesorTelefonoRepo->create($telefono);
                    
            	       return redirect()->route('asesor.index')->with('msg_ok','El asesor ha sido agregado con éxito');}
                   else
                    return redirect()->route('asesor.index')->with('msg_error','No se ha podido agregar al asesor, intente nuevamente.');
                }
            }
            else
                return redirect()->back();  
        }
        else
            return redirect('login');
    }

    // Borrado lógico del Asesor
    public function getDelete($id){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                if($this->asesorRepo->disable($this->asesorRepo->find($id)))
                    return redirect()->route('asesor.index')->with('msg_ok','Asesor eliminado correctamente');
                else
                    return redirect()->route('asesor.index')->with('msg_error',' El asesor no ha podido ser eliminado.');
            }
            else
                return redirect()->back();   
        }
        else
            return redirect('login');
    }

    // Página de Editar
    public function edit($id){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
            	$asesor = $this->asesorRepo->find($id); // Obtengo al Asesor
            	$tipos = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id');
            	return view('asesor.editar',compact('asesor','tipos'));
            }
            else
                return redirect()->back();
        }
        else
            return redirect('login');
    }

    //Modificación del Acesor
    public function postEdit(Request $request){
        if (null !== session('usuario')){
            if (session('usuario')['rol_id'] == 4){
                $data = $request->all();
             //   $asesor=$this->asesorRepo->all()->last();
        
                $model = $this->asesorRepo->find($data['asesor']); // Busco al asesor

                //$mail['asesor_id']=$asesor->id;
                //$mail['mail']=$request->mail;
                //$this->asesorMailRepo->edit($mail);
                if($this->asesorRepo->edit($model,$data)) // Modificación de los datos

                    return redirect()->route('asesor.index')->with('msg_ok','El asesor ha sido modificado con éxito.');
                else
                    return redirect()->route('asesor.index')->with('msg_error',' El asesor no ha podido ser modificado.');
            }
            else
                return redirect()->back();
        }
        else
            return redirect('login');
    }
}
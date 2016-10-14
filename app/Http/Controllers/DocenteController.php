<?php
namespace App\Http\Controllers;
use App\Entities\Docente;
use App\Entities\TipoDocumento;
use App\Http\Repositories\DocenteRepo;
use App\Http\Repositories\FilialRepo;
use App\Http\Repositories\TipoDocumentoRepo;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
class DocenteController extends Controller {

	protected $docenteRepo;
	
    public function __construct(DocenteRepo $docenteRepo, TipoDocumento $tipoDocumentoRepo)
	{
		$this->docenteRepo        = $docenteRepo;
		$this->tipoDocumentoRepo  = $tipoDocumentoRepo;
        $this->user               = session('usuario');
	}

    // Página principal de Docentes
    public function index(){
        if ($this->user['rol_id'] == 4 && session('usuario')) {
        	$docentes = $this->docenteRepo->allEneable(); // Obtención de todos los docentes acrivos
            return view('docentes.index',compact('docentes'));
        }
        else
            return redirect()->back();
    }

    // Página de Nuevo
    public function add(){
        if ($this->user['rol_id'] == 4) {
        	$tipos = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id');
        	return view('docentes.nuevo',compact('tipos'));
        }
        else
            return redirect()->back();
    }

    // Alta Docente
    public function postAdd(Request $request){
        if ($this->user['rol_id'] == 4) {
        	$data = $request->all(); // Obtengo todos los datos del formulario
            $data['filial_id'] = $this->user['entidad_id'];
            
            // Corroboro que el cliente exista, si exite lo activa
            if ( $docente = $this->docenteRepo->check($data['tipo_documento_id'],$data['nro_documento']) ) {
                    return redirect()->route('docentes.index')->with('msg_ok','El docente ha sido agregado con éxito');
            }
            else{
                // Si no existe lo crea
               if($this->docenteRepo->create($data))
        	       return redirect()->route('docentes.index')->with('msg_ok','El docente ha sido agregado con éxito');
               else
                return redirect()->route('docentes.index')->with('msg_error','No se ha podido agregar al docente, intente nuevamente.');
            }
        }
        else
            return redirect()->back();
    }

    // Borrado lógico del Docente
    public function delete($id){
        if ($this->user['rol_id'] == 4) {
            if($this->docenteRepo->disable($this->docenteRepo->find($id)))
                return redirect()->route('docentes.index')->with('msg_ok','Docente eliminado correctamente');
            else
                return redirect()->route('docentes.index')->with('msg_error',' El docente no ha podido ser eliminado.');
        }
        else
            return redirect()->back();
    }

    // Página de Editar
    public function edit($id){
        if ($this->user['rol_id'] == 4) {
        	$docente = $this->docenteRepo->find($id); // Obtengo al docente
        	$tipos = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id');
        	return view('docentes.editar',compact('docente','tipos'));
        }
        else
            return redirect()->back();
    }

    //Modificación del Docente
    public function postEdit(Request $request){
        if ($this->user['rol_id'] == 4) {
            $data = $request->all();
            $data['filial_id'] = $this->user['entidad_id'];
            $model = $this->docenteRepo->find($data['id']); // Busco al docente
            if($this->docenteRepo->edit($model,$data)) // Modificación de los datos
                return redirect()->route('docentes.index')->with('msg_ok','El docente ha sido modificado con éxito');
            else
                return redirect()->route('docentes.index')->with('msg_error',' El docente no ha podido ser modificado.');
        }
        else
            return redirect()->back();
    }
}
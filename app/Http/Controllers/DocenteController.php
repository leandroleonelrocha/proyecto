<?php
namespace App\Http\Controllers;
use App\Entities\Docente;
use App\Entities\TipoDocumento;
use App\Http\Repositories\DocenteRepo;
use App\Http\Repositories\FilialRepo;
use App\Http\Repositories\TipoDocumentoRepo;
use App\Http\Requests\CrearNuevoDocenteRequest;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
class DocenteController extends Controller {
    protected $docenteRepo;
    public function __construct(DocenteRepo $docenteRepo, TipoDocumento $tipoDocumentoRepo,FilialRepo$filialesRepo) 
    {
        $this->docenteRepo = $docenteRepo;
        $this->tipoDocumentoRepo = $tipoDocumentoRepo;
        $this->filialesRepo = $filialesRepo;
    }
    public function index(){
        $docentes = $this->docenteRepo->allEneable();
        return view('docentes.index',compact('docentes'));
    }
    public function add(){
        $tipos = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id');
        $filiales = $this->filialesRepo->lists('nombre','id');
        return view('docentes.nuevo',compact('tipos','filiales'));
    }
    public function postAdd(CrearNuevoDocenteRequest $request){
        $data = $request->all();
        if ( $docente = $this->docenteRepo->check($data['tipo_documento_id'],$data['nro_documento']) ) {
                return redirect()->route('docentes.index')->with('msg_ok','El docente ha sido agregado con éxito');
        }
        else{
           if($this->docenteRepo->create($data))
               return redirect()->route('docentes.index')->with('msg_ok','El docente ha sido agregado con éxito');
           else
            return redirect()->route('docentes.index')->with('msg_error','No se ha podido agregar al docente, intente nuevamente.');
        }
    }
    public function delete($id){
        if($this->docenteRepo->disable($this->docenteRepo->find($id)))
            return redirect()->route('docentes.index')->with('msg_ok','Docente eliminado correctamente');
        else
            return redirect()->route('docentes.index')->with('msg_error',' El docente no ha podido ser eliminado.');
    }
    public function edit($id){
        $docente = $this->docenteRepo->find($id);
        $tipos = $this->tipoDocumentoRepo->all()->lists('tipo_documento','id');
        return view('docentes.editar',compact('docente','tipos'));
    }
    public function postEdit(Request $request){
        $data = $request->all();
        $model = $this->docenteRepo->find($data['id']);
        if($this->docenteRepo->edit($model,$data))
            return redirect()->route('docentes.index')->with('msg_ok','El docente ha sido modificado con éxito');
        else
            return redirect()->route('docentes.index')->with('msg_error',' El docente no ha podido ser modificado.');
    }
}
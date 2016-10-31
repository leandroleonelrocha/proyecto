<?php

namespace App\Http\Repositories;
use App\Entities\Asesor;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class AsesorRepo extends BaseRepo {

    public function getModel()
    {
        return new Asesor();
    }

    public function allEneable(){

        return Asesor::where('activo', 1)->get();
    }

    public function check($tipo,$nro){
        return Asesor::where('tipo_documento_id', $tipo)->where('nro_documento', $nro)->update(['activo'=>1]);
    }

    public function disable($asesor){
        $asesor->activo = 0;
        return $asesor->save();
    }


    public function allAsesorFilial(){
        $filial = session('usuario')['entidad_id'];
        return Asesor::where('activo', 1)->where('filial_id', $filial)->get();
    }

    public function obtenerAsesorFilial($id){

        return Asesor::where('id', $id) ->where('activo',1)->get();
    }




    
}
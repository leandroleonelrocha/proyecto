<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

class CrearNuevoDocenteRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'id' => 'required',
            'tipo_documento_id' => 'required',
            'nro_documento' => 'required',
            'apellidos' => 'required',
            'nombres' => 'required',
            'descripcion' => 'required',
            'filial_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Escriba un número de docente',
            'tipo_documento_id.required' => 'Escriba un tipo de documento',
            'nro_documento.required' => 'Escriba el numero de documento',  
            'apellidos.required' => 'Escriba el nombre',
            'nombres.required' => 'Escriba el apellido',
            'descripcion.required' => 'Escriba la descripcion',  
            'filial_id.required' => 'Seleccione la filial',    
        ];
    }

}
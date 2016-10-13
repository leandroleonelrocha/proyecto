<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

class CrearNuevoDirectorRequest extends Request
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

            'tipo_documento_id' => 'required',
            'nro_documento' => 'required',
            'apellidos' => 'required',
            'nombres' => 'required',

        ];
    }

    public function messages()
    {
        return [
           // 'tipo_documento_id.required' => 'Seleccione un tipo de documento',
            'nro_documento.required' => 'Escriba un numero documento',
            'nombres.required' => 'Escriba el nombre',
            'apellidos.required' => 'Escriba el apellido', 
        ];
    }

}
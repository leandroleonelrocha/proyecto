<?php
/**
 * Created by PhpStorm.
 * User: llrocha
 * Date: 24/06/2016
 * Time: 10:16
 */


namespace App\Http\Requests;
use App\Http\Requests\Request;

class CrearNuevaFilialRequest extends Request
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

            'nombre' => 'required|unique:filial,nombre',
           	'director_id' => 'required',
           	'mail' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Escriba un Nombre',
            'nombre.unique' => 'El nombre de la filial ya está en uso',
            'director_id.required' => 'Selecciona un director',  
            'mail.required' => 'Escriba un email'
        ];
    }

}

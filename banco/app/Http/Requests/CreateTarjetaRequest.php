<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTarjetaRequest extends FormRequest
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
            'id_cliente'=>'required',
            'id_tipo'=>'required',
            'num_tarjeta'=>'required|unique:tarjetas,num_tarjeta',
            'num_cuenta'=>'required|unique:tarjetas,num_cuenta',
            'fecha_caducidad'=>'required',
            'saldo'=>'required'
        ];
    }
}

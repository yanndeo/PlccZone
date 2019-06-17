<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevisFormRequest extends FormRequest
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
            'fullname'=> 'required|min:3',
            'email' =>'required|email',
            'message' => 'required|min:10'
        ];
    }



    public function messages()
    {
        return [
            'fullname.required'=> " N'oubliez pas de preciser votre nom .",
            'fullname.min'=> " Precisez votre nom complet .",

            'email.required'=>'Veuillez fournir un email valide .',
            'email.email' =>'Email probablement invalide',

            'message.required'=> 'Fournissez nous plus de details sur vos besoins.',
            'message.min'=> 'Fournissez nous plus de details sur vos éxigeances.'


        ];
    }



}

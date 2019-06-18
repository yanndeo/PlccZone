<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=> 'required',
            'email' =>'required|email',
            'message' => 'required'
        ];
    }

    /**
     * Personaliser les message
     */
    public function messages()
    {
        return [
            'name.required'=> " N'oubliez pas de preciser votre nom .",

            'email.required'=>'Veuillez fournir un email valide .',
            'email.email' =>'Email probablement invalide',

            'message.required'=> 'Fournissez nous plus de details svp.',


        ];
    }








}

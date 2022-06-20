<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColaboradorRequest extends FormRequest
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
        if(FormRequest::get('edit'))
            return [
                'nome' => ['required', 'min:4'],
            ];
        else
            return [
                'nome' => ['required', 'min:4'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', 'min:8'],
            ];
    }

    public function messages()
    {
        return [
            'tipo.required' => 'Preecher o tipo do colaborador'
        ];
    }
}

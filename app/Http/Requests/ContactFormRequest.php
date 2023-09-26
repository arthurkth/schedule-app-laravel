<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $contactId = $this->route('contact');

        return [
            'name' => 'required|min:3',
            'email' => "required|email|unique:contacts,email,{$contactId},id",
            'phone' => "required|regex:/^\d{11}$/|unique:contacts,phone,{$contactId},id",
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.unique' => 'O endereço de e-mail já está em uso.',
            'email.email' => 'O campo e-mail deve conter um e-mail válido.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'phone.unique' => 'O número de telefone já está em uso.',
            'phone.regex' => 'O telefone deve conter o DDD e número.'
        ];
    }
}

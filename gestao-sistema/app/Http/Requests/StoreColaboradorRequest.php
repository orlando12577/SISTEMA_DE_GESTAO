<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColaboradorRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:colaboradores,email',
            'cpf' => 'required|string|size:11|unique:colaboradores,cpf',
            'unidade_id' => 'required|exists:unidades,id',
        ];
    }

    /**
     * Mensagens de erro personalizadas (opcional)
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do colaborador é obrigatório.',
            'nome.max' => 'O nome do colaborador não pode ter mais de 255 caracteres.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Informe um email válido.',
            'email.unique' => 'Este email já está cadastrado.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.size' => 'O CPF deve conter 11 dígitos.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'unidade_id.required' => 'A unidade é obrigatória.',
            'unidade_id.exists' => 'A unidade selecionada não existe.',
        ];
    }
}

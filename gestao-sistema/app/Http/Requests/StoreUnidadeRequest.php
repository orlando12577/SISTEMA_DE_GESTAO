<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnidadeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|size:14|unique:unidades,cnpj',
            'bandeira_id' => 'required|exists:bandeiras,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nome_fantasia.required' => 'O nome fantasia da unidade é obrigatório.',
            'nome_fantasia.max' => 'O nome fantasia não pode ter mais de 255 caracteres.',
            'razao_social.required' => 'A razão social da unidade é obrigatória.',
            'razao_social.max' => 'A razão social não pode ter mais de 255 caracteres.',
            'cnpj.required' => 'O CNPJ da unidade é obrigatório.',
            'cnpj.size' => 'O CNPJ deve conter 14 dígitos.',
            'cnpj.unique' => 'Este CNPJ já está cadastrado.',
            'bandeira_id.required' => 'A bandeira é obrigatória.',
            'bandeira_id.exists' => 'A bandeira selecionada não existe.',
        ];
    }
}

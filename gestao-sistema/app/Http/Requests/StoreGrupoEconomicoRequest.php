<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrupoEconomicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255|unique:grupos_economicos,nome',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do grupo econômico é obrigatório.',
            'nome.max' => 'O nome do grupo econômico não pode ter mais de 255 caracteres.',
            'nome.unique' => 'Já existe um grupo econômico com esse nome.',
        ];
    }
}

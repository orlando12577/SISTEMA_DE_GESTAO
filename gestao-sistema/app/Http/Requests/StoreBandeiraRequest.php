<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBandeiraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'grupo_economico_id' => 'required|exists:grupos_economicos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome da bandeira é obrigatório.',
            'nome.max' => 'O nome da bandeira não pode ter mais de 255 caracteres.',
            'grupo_economico_id.required' => 'O grupo econômico é obrigatório.',
            'grupo_economico_id.exists' => 'O grupo econômico selecionado não existe.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VagaRequest extends FormRequest
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

     /*
      * $table->string('titulo');
      * $table->decimal('salario', 12, 2);
      * $table->string('local');
      * $table->string('empresa');
      * $table->string('tecnologia');
      */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string',
            'salario' => 'required|numeric',
            'local' => 'required|string',
            'empresa' => 'required|string',
            'tecnologia' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            // tutulo
            'titulo.required' => 'O campo título é obrigatório',
            'titulo.string' => 'O campo título deve ser uma string',

            // salario
            'salario.numeric' => 'O campo salário deve ser um número',
            'salario.required' => 'O campo salário é obrigatório',

            // local
            'local.string' => 'O campo local deve ser uma string',
            'local.required' => 'O campo local é obrigatório',
            // empresa
            'empresa.required' => 'O campo empresa é obrigatório',
            'empresa.string' => 'O campo empresa deve ser uma string',

            // tecnologia
            'tecnologia.required' => 'O campo tecnologia é obrigatório',
            'tecnologia.string' => 'O campo tecnologia deve ser uma string',
        ];
    }
}

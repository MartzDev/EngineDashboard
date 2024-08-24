<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChirpRequest extends FormRequest
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
        return [
            'slug' => 'required|string|unique:chirps,slug',
            'message' => 'required|string|max:255'
        ];
    }

    public function attributes(): array
    {
        return [
            'slug' => 'identificador',
            'message' => 'mensaje'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'el campo :attribute es requerido',
        ];
    }
}

<?php

namespace App\Http\Requests\User;

use App\Traits\BasicFormRequestValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    use BasicFormRequestValidation;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            "name" => [
                "string",
                "required",
                "max:255"
            ],
            "email" => [
                "email",
                "required",
                "unique:users"
            ],
            "password" => [
                "string",
                "required",
                "min:8"
            ],
            "phone_number" => [
                "string",
                "required",
                "max:255"
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            "name" => "nome",
            "email" => "e-mail",
            "password" => "senha",
            "phone_number" => "telefone",
        ];
    }
}
<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers\Requests\IdUserRuleHelper;
use App\Traits\BasicFormRequestValidation;

class UpdateUserRequest extends FormRequest
{
    use BasicFormRequestValidation;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => IdUserRuleHelper::rule(),
            'name' => [
                'string',
                'max:255'
            ],
            'email' => [
                'email',
                'unique:users,email,' . $this->route('id')
            ],
            'password' => [
                'string',
                'min:8'
            ],
            'phone_number' => [
                'string',
                'max:255'
            ],
            'user_type' => [
                'string',
                'in:provider,seeker'
            ],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('id')
        ]);
    }
    
    public function attributes(): array
    {
        return [
            "name" => "nome",
            "email" => "email",
            "password" => "senha",
            "phone_number" => "telefone",
            "user_type" => "tipo de usuário",
        ];
    }
}
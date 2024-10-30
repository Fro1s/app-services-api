<?php

namespace App\Http\Requests\Services;

use App\Traits\BasicFormRequestValidation;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    use BasicFormRequestValidation;

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
            'categoryId' => 'string|exists:categories,id',
            'title' => 'string|max:255',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'availability' => 'array',
            'availability.*.dayOfWeek' => 'date',
            'availability.*.startTime' => 'date_format:H:i',
            'availability.*.endTime' => 'date_format:H:i',
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('id')
        ]);
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropretyContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'lastname' => ['required', 'string', 'min:2'],
            'firstname' => ['required', 'string', 'min:2'],
            'phone' => ['required', 'string', 'min:10'],
            'email' => ['required', 'email', 'min4'],
            'message' => ['required', 'string', 'min:4'],
        ];
    }
}

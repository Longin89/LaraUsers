<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
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
    public function rules(): array
    {
        // Правила валидации для обновления записи

        return [
            'name' => 'string|max:155',
            'email' => 'email|max:155|exists:users,email',
            'password' => 'string|max:155',
            'ip' => ['ipv4', 'unique:users'],
            'comment' => 'string|max:155'
        ];
    }
}

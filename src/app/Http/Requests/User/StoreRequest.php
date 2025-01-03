<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
    public function rules():array
    {
        // Правила валидации для добавления записи

        return [
            'name' => 'required|string|max:155',
            'email' => 'required|email|unique:users|max:155',
            'password' => 'required|string|max:155',
            'ip' => 'required|ip|unique:users|max:155',
            'comment' => 'string|max:155'
        ];
    }
}

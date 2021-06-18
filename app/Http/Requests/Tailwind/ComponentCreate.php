<?php

namespace App\Http\Requests\Tailwind;

use Illuminate\Foundation\Http\FormRequest;

class ComponentCreate extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'regex:/^[A-z0-9 -]*$/u', 'max:191'],
            'position' => ['nullable'],
            'category_id' => ['required'],
            'code' => ['required', 'string']
        ];
    }
}

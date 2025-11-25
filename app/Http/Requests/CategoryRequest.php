<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Hanya admin yang boleh CRUD kategori
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255|unique:categories,name,' . $this->id,
            'description' => 'nullable|string|max:500',
        ];
    }
}

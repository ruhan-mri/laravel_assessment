<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        $userId = $this->route('id');
        return [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|max:100',
            'email' => 'required|string|email|max:255|unique:laravel_users,email' . ($userId ? ',' . $userId : ''),
            'address' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function authorize()
    {
        return true;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAddressRequest extends FormRequest
{
    public function rules()
    {
        $userId = $this->route('id'); 

        return [
            'address' => ['required','string','max:255',
                Rule::unique('addresses', 'address_line')
                ->where(function ($query) use ($userId) {
                    return $query->where('user_id', $userId);
                }),
            ],
        ];
    }

    public function authorize()
    {
        return true;
    }
}

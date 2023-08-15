<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        return [

            'description' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'description')->ignore($this->product)
            ],

        ];
    }

    public function messages()
    {
        return [
            'description.unique' => 'Description: ' . $this->description . ' đã được sử dụng bởi một Post khác.',
        ];
    }
    }


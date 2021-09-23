<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|max:10',
            'serial' => 'required|max:10',
            'name' => 'required|max:200',
            'slug' => 'required|max:200',
            'cost_price' => 'required|numeric|max:12',
            'price' => 'required|numeric|max:12',
            'created_by' => 'required|numeric',
        ];
    }
}

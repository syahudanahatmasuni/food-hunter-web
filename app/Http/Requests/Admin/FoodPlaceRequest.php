<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FoodPlaceRequest extends FormRequest
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
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'about' => 'required',
            'favorite_menu' => 'required|max:255',
            'location' => 'required|max:255',
            'open_hours' => 'required|max:255',
            'cover' => 'required|image', //link to image
        ];
    }
}

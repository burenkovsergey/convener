<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBoardGameRequest extends FormRequest
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
            'name'              => 'bail|required|min:5|max:150',
            'description'       => 'max:5000',
            'min_players_count' => 'min:1',
            'max_players_count' => 'min:1',
            'cover_path'        => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ];
    }
}

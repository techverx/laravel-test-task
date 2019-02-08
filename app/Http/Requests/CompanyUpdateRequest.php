<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'name'      => 'required|max:191',
            'email'     => 'required|email|max:191',
            'logo'      => 'mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
            'website'   => 'required|url'
        ];
    }
}

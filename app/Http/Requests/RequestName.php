<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestName extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function messages()
    {
        return [
            'abstractfile.required' => 'A file is required',
            'abstractfile.mimes' => 'The file must be a type of pdf.',
        ];
    }
}

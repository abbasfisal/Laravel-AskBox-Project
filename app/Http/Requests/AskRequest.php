<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AskRequest extends FormRequest
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
            'title' => 'required',
            'tags' => 'required',
            'filepath' => 'required'
        ];
    }


    public function messages()
    {
        return[
            'title.required'=>'Title Field is Required' ,
            'tags.required'=>'Choose At Least One Category' ,
            'filepath.required'=>'Choose an Image for Ask'
        ];
    }

}

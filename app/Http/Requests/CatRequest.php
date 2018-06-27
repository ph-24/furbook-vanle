<?php

namespace Furbook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
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
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date_format:"Y-m-d"',
            'breed_id' => 'required|numeric',
        ];
    }
    public function messages(){
        return [
            'required' => 'Cot :attribute la bat buoc.',
            'max' => 'Cot :attribute phai nho hon 255 ki tu.',
            'date_format' => 'Cot :attribute dinh dang phai la Y/m/d.',
            'numeric' => 'Cot :attribute phai la kieu so.',
         ];
    }
}

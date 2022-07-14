<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
            'name' => 'required|max:50',
            'grade_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được để trống',
            'max' => 'Nhập tối đa :max kí tự',
        ];
    }
}
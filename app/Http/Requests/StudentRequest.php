<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'classroom_id' => 'required',
            'address' => 'required',
            'gender' => [
                'required',
                Rule::in([
                    Student::GENDER_MALE,
                    Student::GENDER_FEMALE,
                    Student::GENDER_OTHER
                ])
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên',
            'classroom_id' => 'lớp học'
        ];
    }

//    public function messages()
//    {
//        return [
//            'required' => 'Không được để trống',
//            'max' => 'Nhập tối đa :max kí tự',
//        ];
//    }
}

<?php

namespace App\Http\Requests;

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
            'course_id'         =>'required|numeric',
            'user_id'           =>'required|numeric',
            'date_fa'           =>'nullable|string',
            'status'            =>'required|numeric',
            'code'              =>'required|unique:students,code,' . $this->id,
            //'code'              =>['required_if:status,==,3|unique:students,code|',Rule::unique('students')->ignore($this->student)],
            'date_gratudate'    =>'required_if:status,==,3|max:11',
        ];
    }
}

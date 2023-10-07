<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class scholarshipinterviewrequest extends FormRequest
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
            'level'         =>'required|numeric|between:1,3',
            'type_holding'  =>'required|numeric|between:1,3',
            'cooperation'   =>'required|string',
            'motivation'    =>'required|numeric|between:1,6',
            'ability'       =>'required|numeric|between:1,6',
            'obligation'    =>'required|numeric|between:1,6',
            'impact'        =>'required|numeric|between:1,6',
            'validity'      =>'required|numeric|between:1,6',
            'score'         =>'required|numeric|between:1,30',
            'description'   =>'required|string',
            'user_id'       =>'required|numeric',
        ];
    }
}

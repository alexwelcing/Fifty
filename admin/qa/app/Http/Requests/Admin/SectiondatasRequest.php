<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SectiondatasRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'questions_id' => 'required',
                    'dispensing_fee' => 'required',
                    'clarifying_detail' => 'required',
                    'source' => 'required',
                    'source_link' => 'required',
                    'table_select' => 'required',
                    'active' => 'required',
                    'sections_id' => 'required',
                    'users_id' => 'required'

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'questions_id' => 'required',
                    'dispensing_fee' => 'required',
                    'clarifying_detail' => 'required',
                    'source' => 'required',
                    'source_link' => 'required',
                    'table_select' => 'required',
                    'active' => 'required',
                     'sections_id' => 'required',
                    'users_id' => 'required'
                ];
            }
            default:break;
        }
    }



}
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DatasRequest extends FormRequest
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
                    'title' => 'required',
                    'states_id' => 'required|unique:datas,states_id',
                    'table_rows' => 'required',
                    'first_heading'=> 'required',
                    'second_heading' => '',
                    'active' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required',
                    'states_id' => 'required|unique:datas,states_id,'.$this->data->states_id,
                    'table_rows' => 'required',
                    'first_heading'=> 'required',
                    'second_heading' => '',
                    'active' => 'required'
                ];
            }
            default:break;
        }
    }



}
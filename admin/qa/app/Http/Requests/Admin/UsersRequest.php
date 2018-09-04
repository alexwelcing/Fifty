<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
                    'email' => 'required|unique:users,email',
                    'fname' => 'required|max:100',
					'lname'=>'required|max:100',
					'password'=>'required|confirmed'
					
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'email' => 'required|unique:users,email,'.$this->user->id,
                    'fname' => 'required|max:100',
					'lname'=>'required|max:100'
					
                ];
            }
            default:break;
        }
    }



}
<?php

namespace App\Http\Requests\API;

use App\Models\User;
use InfyOm\Generator\Request\APIRequest;

class UserAPIRequest extends APIRequest
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
            case 'POST':
            {
                return [
                    'name'=> 'required|string|min:3|max:191',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6'
                ];
                break;
            }
            case 'PUT':
                return [
                    'name'=> 'required|string|min:3|max:191',
                    'email' => 'required|string|email|max:255|unique:users,email,' . $this->id,
                    'password' => 'sometimes|required|min:6'
                ];
                break;
            default:
                break;
        }
    }

    public function messages(){
        return [
            'name.required' => 'O campo Nome é obrigatorio.',
            'name.min' => 'O campo Nome deve conter mais de 3 caracteres.',
        ];
    }
}

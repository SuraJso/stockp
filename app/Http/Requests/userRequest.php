<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'usr_username' => 'required|string|unique:users',

        ];
    }
    public function messages()
    {
        return [
            'usr_username.requried' => 'username ซ้ำกันครับ',
        ];
    }
}

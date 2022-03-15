<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:225',
            'username' => 'required|max:225|min:3|unique:users,username',
            'email' => 'required|email|max:225|unique:users,email',
            'password' => 'required|min:5|max:25'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => htmlspecialchars($this->name),
            'username' => htmlspecialchars($this->username),
            'email' => htmlspecialchars($this->email),
            'password' => htmlspecialchars($this->password),
        ]);
    }
}

<?php

namespace App\Http\Requests\Api\Auth;

use App\DataTransferObjects\auth\RegisterUserDto;
use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'same:password_confirm'],
            'password_confirm' => ['required', 'string', 'min:6']
        ];
    }

    /**
     * @return RegisterUserDto
     */
    public function getDto(){
        return new RegisterUserDto($this->only(['name', 'email', 'password']));
    }
}

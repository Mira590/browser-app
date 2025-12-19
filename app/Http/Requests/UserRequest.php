<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' =>'nullable|string|max:255',
            'last_name'  =>'nullable|string|max:255',
            'email'      =>'nullable|email|unique:users,email',
            'job_title'  =>'required|string|max:255',
            'username'  =>'required|string|unique:users,username',
            'phone'     =>'nullable|string|max:20',
            'azbid'      =>'nullable|string|max:255',
            'role'       =>'required|in:user,superuser,admin',
            
            'bio'        =>'nullable|string',
            'password'   =>'required|min:6|confirmed',
            'photo'      =>'nullable|image|mimes:jpg,jpeg,png|max:2048',
 

            
        ];
    }
}

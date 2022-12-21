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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:2',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'confirm_password'=>'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên phải nhiều hơn 2 ký tự',
            'email.required' => 'email không được để rỗng',
            'email.email' => 'email phải đúng định dạng',
            'email.unique' => 'email này đã tồn tại',
            'password.required' => 'password không được để rỗng',
            'confirm_password.same' => 'không khớp với mật khẩu'
        ];
    }
}

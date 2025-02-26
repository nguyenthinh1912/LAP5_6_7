<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        $rules = [];
        $method=$this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($method) {
                    case 'register':
                        $rules = [
                            'username' => 'required',
                            'fullname' => 'required',
                            'email' => 'required|email|unique:users,email',
                            'password' => [
                                'required',
                                'confirmed',
                                'min:8',
                                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).+$/'
                            ],
                            'avatar' => 'required'
                        ];
                        break;
                    default:
                        break;
                }
                break;
        }
        return $rules;
    }
    public function messages(){
        return [
            'fullname.required' => "Tên du không được để trống",
            'username.required' => "Tên không được để trống",
            'email.required' => "Email không được để trống",
            'email.email' => "Email không đúng định dạng",
            'email.unique' => "Email đã được đăng ký",
            'password.required' => "Mật khẩu không được để trống",
            'password.confirmed' => "Mật khẩu không trùng khớp",
            'password.min' | 'password.regex' => "Yêu cầu mật khẩu có ít nhất 8 ký tự, chứa các chữ cái và bao gồm các ký tự đặc biệt(*@!#...).",
            'avatar.required' => "Ảnh không được để trống"
        ];
    }
}

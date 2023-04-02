<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

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
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:12']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '・名前を入力してください',
            'name.max' => '・名前は50文字以内で入力してください',
            'email.required' => '・メールアドレスを入力してください',
            'email.max' => '・メールアドレスは100文字以内で入力してください',
            'email.email' => '・メールアドレスの形式で入力してください',
            'email.unique' => '・登録済みのメールアドレスです',
            'password.required' => '・パスワードを入力してください',
            'password.min' => '・パスワードは8〜12文字で入力してください',
            'password.max' => '・パスワードは8〜12文字で入力してください',
        ];
    }
}

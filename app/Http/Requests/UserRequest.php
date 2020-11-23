<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required', // 名前
            'email' => 'required|email', // メールアドレス
            'user_password' => 'required', // パスワード
        ];
    }

    public function messages()
    {
        // エントリーフォームの入力値確認
        $messages = [
            'name.required' => '名前を入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスの形式が違います。',
            'user_password.required' => 'パスワードを入力してください。',
        ];
        
        return $messages;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MylistRequest extends FormRequest
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
            'year' => 'required', // 年
            'cours_id' => 'required', // クール
            'title' => 'required', // 番組名
            'channel' => 'required', // 放送チャンネル
            'onair_weekday_num' => 'required', // 放送曜日
            'onair_time' => ['required', 'regex:/([01][0-9]|2[0-7]):[0-5][0-9]$/'], // 放送時間
            'onair_start_date' => 'required|date', // 放送開始日
        ];
    }

    public function messages()
    {
        // エントリーフォームの入力値確認
        $messages = [
            'year.required' => '年を入力してください。',
            'cours_id.required' => 'クールを入力してください。',
            'title.required' => '番組名を入力してください。',
            'channel.required' => '放送チャンネルを入力してください。',
            'onair_weekday_num.required' => '放送曜日を入力してください。',
            'onair_time.required' => '放送時間を入力してください。',
            'onair_time.regex' => '放送時間が時間の形式ではありません。',
            'onair_start_date.required' => '放送開始日を入力してください。',
            'onair_start_date.date' => '放送開始日が日付形式ではありません',
        ];
        
        return $messages;
    }
}

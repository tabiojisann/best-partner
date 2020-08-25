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
            'name' => 'required|max:10',
        ];
    }

    public function attributes()
    {
        return [
            'name'       =>  'ニックネーム',
            'image'      =>  'アイコン',
            'sex'        =>  '性別',
            'birthday'   =>  '生年月日',
            'age'        =>  '年齢',
            'birthplace' =>  '出身地',
            'height'     =>  '身長',
            'weight'     =>  '体重',
            'skill'      =>  '特技、資格',
            'influence'  =>  '影響を受けたもの',
            'background' =>  '学歴',
            'hobby'      =>  '趣味',
            'youtube'    =>  'yutubeチャンネル',
            'twitter'    =>  'ツイッターアカウント',
            'blog'       =>  'ブログ',
            'PR'         =>  '備考欄',
        ];
    }
}

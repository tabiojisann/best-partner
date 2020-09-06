<?php

namespace App\Http\Requests;

use Illuminate\Validation\Validator;

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
            'name'       => ['max:12'],
            'image'      => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'sex'        => ['string', 'in:男性,女性', 'nullable'],
            'birthday'   => ['date_format:"Y-m-d"', 'nullable'],
            'age'        => ['integer', 'digits_between:1,3', 'nullable'],
            'birthplace' => ['string', 'nullable'],
            'height'     => ['integer', 'between:1,300', 'nullable'],
            'weight'     => ['integer', 'between:1,200', 'nullable'],
            'skill'      => ['string', 'nullable'],
            'influence'  => ['string', 'nullable'],
            'background' => ['string', 'max:30', 'nullable'],
            'hobby'      => ['string', 'nullable'],
            'youtube'    => ['url', 'regex:~https://www.youtube.com~', 'nullable'],
            'twitter'    => ['url', 'regex:~https://twitter.com~', 'nullable'],
            'blog'       => ['url', 'nullable'],
            'PR'         => ['string', 'max:2000', 'nullable']
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


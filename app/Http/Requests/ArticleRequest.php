<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title'    => ['required', 'max:100'],
            'text'     => ['required', 'max:2000'],
            'position' => ['required', 'in:ボケ,ツッコミ,作家,その他'],
            'style'    => ['required', 'in:漫才,コント,その他'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'text'  => '本文',
            'image' => '画像',
            'position' => '募集ポジション',
            'style' => '募集スタイル',
        ];
    }
}

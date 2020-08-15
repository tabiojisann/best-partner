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
            'title' => 'required|max:100',
            'text' => 'required|max:2000',
            'position' => 'required',
            'style' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'text'  => '本文',
            'image' => '画像',
            'position' => 'ポジション',
            'style' => 'スタイル',
        ];
    }
}

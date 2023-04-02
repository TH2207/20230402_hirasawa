<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluateRequest extends FormRequest
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
            'evaluate_comment' => ['required','string', 'max:200']
        ];
    }

    public function messages()
    {
        return [
            'evaluate_comment.required' => '・評価コメントを入力してください',
            'evaluate_comment.max' => '・200文字以内に入力してください'
        ];
    }
}

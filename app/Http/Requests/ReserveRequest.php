<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'reserve_at_date' => ['required', 'date', 'after:today']
        ];
    }

    public function messages()
    {
        return [
            'reserve_at_date.after' => '・本日より後の日付を指定してください。'
        ];
    }
}

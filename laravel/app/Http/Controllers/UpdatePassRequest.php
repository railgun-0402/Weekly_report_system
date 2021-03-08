<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassRequest extends FormRequest
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
            'current-password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if(!(\Hash::check($value, \Auth::user()->password))) {
                      return $fail('現在のパスワードを正しく入力してください');
                    }
                },
            ],
            'new-password' => 'required|string|min:8|confirmed|different:current-password',
        ];
    }
}
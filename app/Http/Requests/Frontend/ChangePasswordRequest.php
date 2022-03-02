<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Http\FormRequest;

/**
 * AdminChangePasswordRequest
 */
class ChangePasswordRequest extends FormRequest
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

            'current_password' => 'required|current_password',
            'password' => 'required|min:6|max:15',
            'confirm_password' => 'required|same:password',
        ];
    }


    /**
     * Method messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'current_password.current_password' => __('request.current_password'),
        ];
    }
}

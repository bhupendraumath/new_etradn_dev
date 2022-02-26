<?php



namespace App\Http\Requests\Frontend;



use Illuminate\Foundation\Http\FormRequest;

use Lang;



class LoginRequest extends FormRequest

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

            'email' => 'required|email',

            'password' => 'required'

        ];
    }



    public function messages()
    {

        return [

            'email.required'    => __('request.admin.login.email.required'),

            'email.email'  => __('auth.invalid_email'),

            'password.required' => __('request.admin.login.password.required'),

            'password.remove_spaces' => __('admin.remove_spaces'),

        ];
    }
}

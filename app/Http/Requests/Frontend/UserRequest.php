<?php



namespace App\Http\Requests\Frontend;



use Illuminate\Foundation\Http\FormRequest;

use Lang;



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

            'first_name' => 'required|min:2|max:25|string',
            'last_name' => 'required|min:2|max:25|string',
            'phone' => 'required|min:6|max:14|unique:tbl_users,phone_number',
            'email' => 'required|email|unique:tbl_users,email',
            'user_type' => 'required',
            'business_name' => 'required_if:user_type,s',
            'password' => 'required|string|min:6|max:15',
            'password_confirmation' => 'required|
            string|min:6|same:password',
            'business_category' => 'required_if:user_type,s',
            'business_type_id' => 'required_if:user_type,s'

        ];
    }
}

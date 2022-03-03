<?php



namespace App\Http\Requests\Frontend;



use Illuminate\Foundation\Http\FormRequest;

use Lang;



class UserUpdateRequest extends FormRequest

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
            'phone_number' => 'required|min:6|max:14',
            'user_type' => 'required',
            'business_name' => 'required_if:user_type,s',
            'category' => 'required_if:user_type,s',
            'business_type_id' => 'required_if:user_type,s',
            'minimum_order' => 'required_if:user_type,s',
            'address' => 'required_if:user_type,s',
            'description' => 'required_if:user_type,s'

        ];
    }
}

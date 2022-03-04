<?php



namespace App\Http\Requests\Frontend;



use Illuminate\Foundation\Http\FormRequest;

use Lang;



class BusinessAddRequest extends FormRequest

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

            'name' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
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
            'name.required' => __('request.shop_name_required'),
            'address1.required' => __('request.address1_required'),
            'city.required' => __('request.city_required'),
            'state.required' => __('request.state_required'),
            'country.required' => __('request.country_required'),
            'zip_code.required' => __('request.zip_code_required'),
        ];
    }
}

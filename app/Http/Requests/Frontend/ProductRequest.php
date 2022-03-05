<?php



namespace App\Http\Requests\Frontend;



use Illuminate\Foundation\Http\FormRequest;

use Lang;



class ProductRequest extends FormRequest

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

            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'product_name_eng' => 'required',
            'product_description_eng' => 'required',
            'warranty_description_eng' => 'required',
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
            'category_id.required' => __('request.category_id_required'),
            'sub_category_id.required' => __('request.sub_category_id_required'),
            'brand_id.required' => __('request.brand_id_required'),
            'product_name_eng.required' => __('request.product_name_eng_required'),
            'product_description_eng.required' => __('request.product_description_eng_required'),
            'warranty_description_eng.required' => __('request.warranty_description_eng_required'),

        ];
    }
}

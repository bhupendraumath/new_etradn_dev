<?php



namespace App\Http\Requests\Frontend;



use Illuminate\Foundation\Http\FormRequest;

use Lang;



class RfqFormRequest extends FormRequest

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

            'rfq_product_name' => 'required|min:2|max:200|string',
            'rfq_product_categories' => 'required',
            'rfq_Sourcing' => 'required',
            'rfq_sPurpose' => 'required',
            'rfq_Quantity' => 'required',
            'rfq_part' => 'required',
            'rfq_Trade' => 'required',
            'rfq_Preferred' => 'required',
            'rfq_carrency' => 'required',
            'rfq_Details' => 'required',
            'rfq_Certifications' => 'required',
            'rfq_otherRequirements' => 'required',
            'rfq_Shipping' => 'required',
            'rfq_country' => 'required',
            'rfq_Leadtime' => 'required',
            'rfq_Payment_Term' => 'required',
            'rfq_agree' => 'required',
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
            'product_name.required' => __('request.rfq_produt_name_required')
        ];
    }
}

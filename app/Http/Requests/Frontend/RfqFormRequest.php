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

            'product_name' => 'required|min:2|max:25|string',
            'product_categories' => 'required',
            'sourcing' => 'required',
            'purpose' => 'required',
            'quantity' => 'required',
            'part' => 'required',
            'trade' => 'required',
            'preferred' => 'required',
            'carrency' => 'required',
            'details' => 'required',
            'certifications' => 'required',
            'other_requirements' => 'required',
            'shipping' => 'required',
            'country' => 'required',
            'leadtime' => 'required',
            'payment_term' => 'required',
            // 'agree' => 'required',
        ];
    }
}

<?php



namespace App\Http\Requests\Frontend;



use Illuminate\Foundation\Http\FormRequest;

use Lang;



class RefundProductRequest extends FormRequest

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
            'cart_id' => 'required',
            'order_item_id' => 'required',
            'product_id' => 'required',
            'admin_approval_status' => 'required',
            'seller_approval_status' => 'required',
            'payment_status' => 'required',
            'status' => 'required',
            'admin_notification' => 'required',
            'buyer_desc' => 'required',
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
            'buyer_desc.required' =>"description is required",
            'cart_id.required' =>"cart id is required",
            'order_item_id.required' =>"order_item_id is required",
            'product_id.required' =>"product_id is required",
            'admin_approval_status.required' =>"admin_approval_status is required",
            'seller_approval_status.required' =>"seller_approval_status is required",
            'payment_status.required' => "payment_status is required",
            'status.required' => 'status is required',
            'admin_notification.required' => 'admin_notification is required'

        ];
    }
}

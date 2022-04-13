<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class BidRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()

    {

        return [
            'user_id' => 'required',
            'seller_id' => 'required',
            'quantity' => 'required',
            'paqid' => 'required',
            'payment_status' => 'required',
            'bid_status' => 'required',
            'cart_id' => 'required',
            'bid_number' => 'required',
            'is_buyer_late' => 'required',
            'is_seller_late' => 'required',
            'status' => 'required',
            'bid_amount' => 'required',
            'product_id' => 'required',
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
            // 'user_id.required' => __('request.category_id_required'),
            // 'seller_id.required' => __('request.sub_category_id_required'),
            // 'quantity.required' => __('request.brand_id_required'),
            // 'paqid.required' => __('request.product_name_eng_required'),
            // 'payment_status.required' => __('request.product_description_eng_required'),
            // 'bid_status.required' => __('request.warranty_description_eng_required'),
            // 'is_buyer_late.required' => 'Please add product image'
            // 'is_seller_late.required' => 'Please add product image'
            // 'status.required' => 'Please add product image'
            'bid_amount.required' => 'Please fill Bid Amound',
            'product_id.required' => 'Please add product',

        ];
    }
}

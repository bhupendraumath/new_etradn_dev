<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuantity extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_product_attribute_quantity';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'product_id',
        'condition_id',
        'quantity',
        'price',
        'discount',
        'createdDate'
    ];

    public function createORUpdatePAQ($productId, $request) {
        $createOrUpdatePAQ = ProductQuantity::updateOrCreate(
            [
                'product_id' => $productId,
            ],[
                'condition_id' => $request->condition_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'discount' => $request->discount,
                'createdDate' => Carbon::now()
            ]
        );
        return $createOrUpdatePAQ;
    }


}

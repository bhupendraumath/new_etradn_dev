<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class RefundRequestDetails extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'refund_id',
        'refund_img',
        'type',
        'type_id',
        'status',
        
    ];


    protected $table = 'tbl_refund_proof';



    // public function user(){
    //     return $this->belongsTo(User::class, 'buyerId', 'id');
    // }

   

}

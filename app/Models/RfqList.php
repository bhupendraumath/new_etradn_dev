<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfqList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_rfq';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    public $timestamps = false;
    protected $fillable = [
        'rfq_product_name',
        'rfq_product_categories',
        'rfq_Sourcing',
        'rfq_sPurpose',
        'rfq_Quantity',
        'rfq_part',
        'rfq_Trade',
        'rfq_Preferred',
        'rfq_carrency',
        'rfq_Details',
        'rfq_Attachments',
        'rfq_Certifications',
        'rfq_otherRequirements',
        'rfq_Shipping',
        'rfq_country',
        'rfq_Leadtime',
        'rfq_Payment_Term',
        'rfq_agree',
        'rfq_createdatetime',
        'rfq_status',
        'rfq_accerpt_userid' 
    ];

}

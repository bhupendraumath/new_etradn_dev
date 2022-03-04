<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_address';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'address_type',
        'userId',
        'name',
        'street_name',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'zip_code',
        'isActive',
        'isPrimary',
        'createdDate',
        'updatedDate'
    ];
}

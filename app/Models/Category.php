<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_product_cat';
    use HasFactory;
    public $with=['sub_category'];

    public function category_based_product()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id')->where("is_delete",'n');
    }

    public function sub_category()
    {
        return $this->hasMany(SubCategory::class, 'catId', 'id')->where('isActive','y');
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    protected $table = 'tbl_product_image';
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'product_img',
        'upload_from',
        'createdDate',
        'updatedDate'
    ];

    public function saveImageProduct($productId, $image) {
        $saveImage = ImageUpload::create([
            'product_id' => $productId,
            'product_img' => $image,
            'upload_from' => 'mobile',
            'createdDate' => Carbon::now(),
            'updatedDate' => Carbon::now()
        ]);
        return $saveImage;
    }

    public function updateImageProduct($productId, $image) {
        $saveImage = ImageUpload::updateOrCreate(
        [
            'product_id' => $productId,
        ],[
            'product_img' => $image,
            'upload_from' => 'mobile',
            'createdDate' => Carbon::now(),
            'updatedDate' => Carbon::now()
        ]);
        return $saveImage;
    }

    public function imageProductById($id) {
        $productImage = ImageUpload::where('product_id', $id)->first();
        return $productImage;
    }
}

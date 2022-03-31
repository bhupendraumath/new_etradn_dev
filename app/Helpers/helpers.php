<?php

use App\Models\Address;
use App\Models\Bids;
use App\Models\FavoriteProduct;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\RefundRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


/**
 * Function getImage
 *
 * @param [type] $fileName 
 * @param [type] $folder 
 * 
 * @return void
 */
function getImage($fileName, $folder = 'profile_image')
{


    $userType = isset(Auth::guard('web')->user()->user_type);
    $src = (isset($userType) &&  $userType == 'admin') ?
        url('assets/images/admin/default-user-img.jpg') : url('assets/images/admin/default-user-img.jpg');

    if ($fileName) {
        $exists = Storage::disk(\config('app.STORAGE_TYPE'))->exists($fileName);

        if ($exists && $fileName) {
            $imageName = Storage::disk(
                \config('app.STORAGE_TYPE')
            )->url($fileName);
            $src = $imageName;
        }
    }

    return $src;
}

/**
 * Function generateOtp
 *
 * @return void
 */
function generateOtp()
{
    return mt_rand(100000, 999999);
}

/**
 * Method getDateTime.
 *
 * @param string $dateTime [explicite description]
 * @param string $format   [explicite description]
 *
 * @return void
 */
function getDateTime($dateTime, $format = 'Y-m-d H:i')
{
    if ($dateTime) {
        return date($format, strtotime($dateTime));
    } else {
        return '---';
    }
}

/**
 * Method convertTimezoneUsingCarbon
 *
 * @param [type] $date 
 * @param [type] $from 
 * @param string $to 
 * 
 * @return void
 */
function convertDateUser($date, $from, $to, $format = '')
{
    $fromTimezone = ($from != '') ? $from : date_default_timezone_get();
    $toTimeZone =  ($to != '') ? $to : 'Asia/Kolkata';
    $dateToConvert = ($date) ? $date : date('Y-m-d H:i:s');
    $toDate = new \DateTime($dateToConvert, new \DateTimeZone($fromTimezone));
    $toDate->setTimeZone(new \DateTimeZone($toTimeZone));
    if ($format) {
        return $toDate->format($format);
    } else {
        return $toDate->format('d M, Y');
    }
}
/**
 * Method updateLastLoginDate
 *
 * @return void
 */
function updateLastLoginDate()
{
    $userId = auth()->user()->id;
    return User::where(['id' => $userId])->update(
        [
            'last_login_date' => now()
        ]
    );
}

/**
 * Method sellerRatingCount
 * 
 * @return void
 */
function sellerRatingCount()
{
    $userId = auth()->user()->id;
    return ProductReview::where(['sellerId' => $userId])->count();
}


/**
 * Method sellerBusinessAddressCount
 * 
 * @return void
 */
function sellerBusinessAddressCount($type)
{
    $userId = auth()->user()->id;
    return Address::where(
        [
            'userId' => $userId,
            'address_type' => $type
        ]
    )->count();
}
/**
 * Method sellerUploadProductCount
 * 
 * @return void
 */
function sellerUploadProductCount()
{
    $userId = auth()->user()->id;
    return Product::where(
        [
            'user_id' => $userId,
            'is_delete' => 'n'
        ]
    )->count();
}

/**
 * Method sellerBidPlacedCount
 * 
 * @return void
 */
function sellerBidPlacedCount()
{
    $userId = auth()->user()->id;
    return Bids::where(
        [
            'seller_id' => $userId
        ]
    )->count();
}

/**
 * Method sellerorderCount
 * 
 * @return void
 */
function sellerorderCount()
{
    $userId = auth()->user()->id;
    return OrderItem::where(
        [
            'seller_id' => $userId
        ]
    )->count();
}

/**
 * Method sellerRefundCount
 * 
 * @return void
 */
function sellerRefundCount()
{
    $userId = auth()->user()->id;
    return RefundRequest::select(
        'tbl_refund_details.product_id'
    )
        ->join('tbl_product', 'tbl_product.id', 'tbl_refund_details.product_id')
        ->where('tbl_product.user_id', $userId)->count();
}

/**
 * Method buyerFavoriteProductCount
 * 
 * @return void
 */
function buyerFavoriteProductCount()
{
    $userId = auth()->user()->id;
    return FavoriteProduct::where(
        [
            'user_id' => $userId
        ]
    )->count();
}

/**
 * Method buyerplacedbids
 * 
 * @return void
 */
function buyerBidPlacedCount()
{
    $userId = auth()->user()->id;
    return Bids::where(
        [
            'user_id' => $userId
        ]
    )->count();
}

/**
 * Method buyerordercount
 * 
 * @return void
 */
function buyerOrderCount()
{
    $userId = auth()->user()->id;
    return Order::where(
        [
            'buyer_id' => $userId
        ]
    )->count();
}

/**
 * Method sellerBusinessAddressCount
 * 
 * @return void
 */
function getSellerAddress()
{
    $userId = auth()->user()->id;
    $address = Address::where(
        [
            'userId' => $userId,
            'address_type' => 'shipping',
            'isPrimary' => 'y'
        ]
    )->first();
    return $address->address1 . ',' . $address->city . ',' . $address->state . ',' . $address->country . ',' . $address->zip_code;
}

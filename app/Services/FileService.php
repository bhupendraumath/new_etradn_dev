<?php

namespace App\Services;

use Storage;
use Image;

/**
 * User FileService
 */
class FileService
{

    /**
     * User FileService uploadBaseCodeImage
     */
    function uploadBaseCodeImage($path, $image, $permission = 'public')
    {

        list($type, $image) = explode(';', $image);

        list(, $image) = explode(',', $image);

        $image = base64_decode($image);

        $imageName = rand() . '.png';

        $s3 = \Storage::disk('uploads');

        $s3->put($path . $imageName, $image, $permission);

        return $path . $imageName;
    }

    /**

     * used for upload images

     * @param $image and $id 

     */

    function addIntoBucket($destination, $image, $permission = 'public')
    {



        $path = $destination . '/' . $image;

        $exists = \Storage::disk('s3')->exists($path);

        if (!$exists) {

            \Storage::disk('s3')->put($path, file_get_contents($image));

            return true;
        }

        return false;
    }



    function checkImage($fileName)
    {

        $src = url('public/assets/images/default-user-img.jpg');

        if ($fileName) {

            $exists = \Storage::disk('s3')->exists($fileName);

            if ($exists && $fileName) {

                $imageName = \Storage::disk('s3')->url($fileName);

                $src = $imageName;
            }
        }

        return $src;
    }



    function deleteFromBucket($fileName, $path)
    {

        $exists = \Storage::disk('s3')->exists($path);

        if (!$exists) {

            \Storage::disk('s3')->delete($path . $fileName);

            return true;
        }

        return false;
    }



    function uploadDocument($destinationPath, $file, $permission = 'public')
    {

        if (!empty($file)) {

            $s3 = \Storage::disk('uploads');

            $name = $s3->put($destinationPath, $file, $permission);

            return $name;
        }

        return false;
    }
}

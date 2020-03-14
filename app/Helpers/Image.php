<?php

namespace Haris\Helpers;


class Image
{
    const TYPE_PRODUCT = "type_product";

    public static function getImageSrc($path, $width, $height)
    {
        if ($width || $height) {
            return env('IMAGE_URL')."resized/".$width."X".$height."/".$path;
        }
        return env('IMAGE_URL')."media/".$path;
    }

    public static function getSrc($object, $width = null, $height = null)
    {
        $path = "";
        // if ($object instanceof ProductImage) {
        //     $path="$object->product_id/$object->name";
        // } elseif ($object instanceof Product) {
        //     $path="$object->id/$object->size_chart";
        // } elseif (empty($object)) {
        //     $path = "default.jpg";
        // }

        return self::getImageSrc($path, $width, $height);
    }
}

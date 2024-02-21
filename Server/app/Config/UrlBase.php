<?php

namespace App\Config;

class UrlBase
{
    public static function getImageCustomer($image)
    {
        return 'storage/image/customer/' . $image;
    }
    public static function getImageCategory($image)
    {
        return 'storage/image/category/' . $image;
    }
    public static function getImageProduct($image)
    {
        return 'storage/image/product/images/' . $image;
    }
}

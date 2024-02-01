<?php

namespace App\Config;

class UrlBase
{
    public static function getImageCustomer($image)
    {
        return 'storage/image/customer/' . $image;
    }
}

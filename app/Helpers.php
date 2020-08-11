<?php
/**
 * Created by PhpStorm.
 * User: alisonbruno
 * Date: 15/02/2019
 * Time: 15:24
 */

namespace App;


class Helpers
{
    /**
     * Retorna a url para a pasta storage
     * @param $file
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public static function storage($file)
    {
        return asset('storage/' . $file);
    }

    /**
     * @param $datetime
     * @param string $format
     * @return false|string
     */
    public static function formatDateTimeToView($datetime, $format = "d/m/Y H:i:s")
    {
        $tmp = strtotime($datetime);
        return date($format, $tmp);
    }
}
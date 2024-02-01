<?php

namespace App\Helpers;

class StringHelpers
{

    public static function markTermWithBolderTag($string, $term)
    {
        $pos = strpos(strtolower($string), strtolower($term));
        $len = strlen($term);
        if ($pos) {
            $marked = substr_replace($string, "<b>", $pos, 0);
            $string = substr_replace($marked, "</b>", $pos + $len + 3, 0);
        }
        return $string;
    }

}

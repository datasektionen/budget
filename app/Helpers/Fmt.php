<?php

namespace App\Helpers;

class Fmt {
    public static function cash($input, $pot = 0, $decimals = 2) {
        $input = $input / pow(10, $pot);
        return number_format($input, $decimals, ',', ' ');
    }

    public static function join($list, $conjunction = 'och') {
        if (!is_array($list)) {
            $list = $list->toArray();
        }

        if (count($list) == 0) {
            return "";
        }
        
        $last = array_pop($list);
        if ($list) {
            return implode(', ', $list) . ' ' . $conjunction . ' ' . $last;
        }
        return $last;
    }
}

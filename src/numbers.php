<?php

if (!function_exists('custom_number_format')) {
    function custom_number_format($n, $precision = 3)
    {
        if ($n < 1000000) {
// Anything less than a million
            $n_format = number_format($n);
        } else if ($n < 1000000000) {
// Anything less than a billion
            $n_format = number_format($n / 1000000, $precision) . 'M';
        } else {
// At least a billion
            $n_format = number_format($n / 1000000000, $precision) . 'B';
        }

        return $n_format;
    }
}
if (!function_exists('int_smallify')) {
    function int_smallify($n, $show_zero = false)
    {
        if ($n <= 0) {
            if ($show_zero){
                return '0';
            }
            return;
        }
        $k = pow(10, 3);
        $mil = pow(10, 6);
        $bil = pow(10, 9);

        if ($n >= $bil)
            return (int)($n / $bil) . 'B';
        else if ($n >= $mil)
            return (int)($n / $mil) . 'M';
        else if ($n >= $k)
            return (int)($n / $k) . 'K';
        else
            return (int)$n;
    }
}
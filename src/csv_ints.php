<?php
if ( ! function_exists('csv_ints'))
{
    function csv_ints($csv, $delineator = ','){
        $csv = preg_replace('/[^0-9'.$delineator.']/', '', $csv);
        $csv = preg_replace('/['.$delineator.']{2,}/',$delineator, $csv);
        return rtrim($csv, ",");
    }
}

if ( ! function_exists('explode_ints'))
{
    function explode_ints($csv)
    {
        $csv = csv_ints($csv);
        if (empty($csv))
        {
            return null;
        }
        return explode(',',$csv);
    }
}
if ( ! function_exists('is_csv_of_ints'))
{
    function is_csv_of_ints($str, $delineator = ','){
        return (preg_match('/[0-9'.$delineator.']*/',$str)==1)?true:false;
    }
}


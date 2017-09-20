<?php

if ( ! function_exists('html_format_dollar'))
{
    function html_format_dollar($amount, $showDecimal = true) {
        $amount = (isset($amount)) ? $amount : 0;
        $items = explode('.', (string)$amount);
        if ($items[0] == "0"){
            return '<span class="currency-sign">$</span><span class="currency-amount">0</span>';
        }
        if ($showDecimal){
            return '<span class="currency-sign">$</span><span class="currency-amount">' . $items[0] . '</span><span class="currency-decimal">.</span><span class="currency-cents">' . $items[1] . '</span>';

        }
        return '<span class="currency-sign">$</span><span class="currency-amount">' . $items[0] . '</span><span class="currency-cents">' . $items[1] . '</span>';
    }
}

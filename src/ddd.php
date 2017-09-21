<?php
if (! function_exists('ddd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function ddd(...$args)
    {
        foreach ($args as $x) {
            print_r($x);
        }

        die(1);
    }
}
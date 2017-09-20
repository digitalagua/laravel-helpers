<?php

use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

if (! function_exists('mixUrl')) {
    /**
     * Get the path to a versioned Mix file.
     *
     * @param  string  $path
     * @param  string  $manifestDirectory
     * @return \Illuminate\Support\HtmlString
     *
     * @throws \Exception
     */
    function mixUrl($path, $manifestDirectory = '', $baseUrl = null)
    {
        static $manifest;

        if (! starts_with($path, '/')) {
            $path = "/{$path}";
        }

        if ($manifestDirectory && ! starts_with($manifestDirectory, '/')) {
            $manifestDirectory = "/{$manifestDirectory}";
        }

        if (file_exists(public_path($manifestDirectory.'/hot'))) {
            return new HtmlString("//localhost:8080{$path}");
        }

        if (! $manifest) {
            if (! file_exists($manifestPath = public_path($manifestDirectory.'/mix-manifest.json'))) {
                throw new Exception('The Mix manifest does not exist.');
            }

            $manifest = json_decode(file_get_contents($manifestPath), true);
        }

        if (!is_null($baseUrl)){
            if (strlen($baseUrl) > 1 && Str::endsWith($baseUrl, '/')) {
                $baseUrl = substr($baseUrl, 0, -1);
            }
            return new HtmlString($baseUrl . $manifestDirectory . $manifest[$path]);
        }

        if (! array_key_exists($path, $manifest)) {
            throw new Exception(
                "Unable to locate Mix file: {$path}. Please check your ".
                'webpack.mix.js output paths and try again.'
            );
        }

        return new HtmlString($manifestDirectory.$manifest[$path]);
    }
}
/**
 * Converts input into array
 *
 * @param mixed $items int, string or array of ints and strings
 * @return array
 */
if ( ! function_exists('make_array'))
{
    function make_array($items, $delineator = ',') {
        if (is_string($items))
        {
            $items = explode($delineator, $items);
        }
        elseif (is_int($items))
        {
            $items = array($items);
        }
        elseif (!is_array($items))
        {
            $items = array(null);
        }
        foreach($items as $item)
        {
            if (gettype($item) == 'string'){
                $items = array_map('trim', $items);
                continue;
            }

        }
        if ($items[0] == null) {
            return null;
        }
        return $items;
    }
}
if ( ! function_exists('array_csv_conjunction'))
{
    function array_csv_conjunction($items, $conjunction = 'and') {
        return str_lreplace(', ',' ' . $conjunction . ' ', implode(', ', $items));
    }
}


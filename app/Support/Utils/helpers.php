<?php

use App\Models\Allergy;
use App\Models\Page;
use App\Models\Config;
use App\Models\Language;
use App\Models\RemoteCategory;
use App\Models\MeasurementUnit;
use App\Models\NewsletterEmail;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

if (!function_exists('slug')) {
    function slug($str)
    {
        if (is_array($str)) {
            $str = implode(' ', $str);
        }

        $str = str_replace(
            ['Ö', 'ö', 'Ü', 'ü', 'Ş', 'ş', 'I', 'ı', 'İ'],
            ['O', 'o', 'U', 'u', 'S', 's', 'i', 'i', 'i'],
            $str
        );

        return Str::slug($str);
    }
}

if (!function_exists('generate_string')) {

    /*
     * @param int $length
     *
     * @return string
     * */

    function generate_string($length = 10)
    {
        $range = 35;
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        $random_string = '';

        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, $range)];
        }

        return str_shuffle($random_string);
    }
}

if (!function_exists('date_to_path')) {
    /**
     * returns true if number is mobile phone
     * @param number string
     * @return string
     * */
    function date_to_path($date = null)
    {
        if ($date) {
            return Carbon::make($date)->format('Y/m/d');
        } else {
            return Carbon::now()->format('Y/m/d');
        }
    }
}

if (!function_exists('api_user')) {
    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     * */
    function api_user()
    {
        return auth('api')->user();
    }
}

if (!function_exists('shorten_string')) {
    /**
     * shortens given string with given length
     * @param $string string
     * @param $length integer
     * @return string
     * */
    function shorten_string($string, $length = 100)
    {
        if (mb_strlen($string) <= $length) {
            return $string;
        }

        $string = substr($string, 0, $length);
        $string = substr($string, 0, strrpos($string, ' '));
        return $string . '...';
    }
}

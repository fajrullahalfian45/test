<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('url')) {

    function url($param = TRUE)
    {
        if ($param) {
            return 'https://horisonhotels.com/';
        }
        return 'https://extranet.horisonhotels.com/';
    }
}
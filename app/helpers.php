<?php

use App\Models\General;

if (!function_exists('setting')) {
    function setting($key, $default = null) {
        return General::get($key, $default);
    }
}


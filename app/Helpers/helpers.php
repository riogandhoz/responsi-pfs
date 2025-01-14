<?php

if (!function_exists('get_avatar_url')) {
    function get_avatar_url($name, $size = 32) {
        return "https://ui-avatars.com/api/?name=" . urlencode($name) . "&size=" . $size . "&background=random";
    }
}
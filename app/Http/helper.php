<?php
namespace App\Http;


if(!function_exists('aural')){
    function adminurl($url = null)
    {
        return URL('admin/',$url);
    }
}

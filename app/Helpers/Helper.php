<?php

use Illuminate\Support\Facades\Http;

if (!function_exists('repeat_img'))
{
    //get data form themoviedb and get token and base url form .env
    function getApiData($route,$arr){
        return Http::withToken(config('services.tmdp.token'))
                ->get(config('services.tmdp.url').$route)
                ->json()[$arr];
    }
    //get pargraph and return it as slug
    function SlugIt($name){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    }
    //get pargraph and unslug
    function UnSlug($name){
        return ucfirst(str_replace('-', ' ', $name));
    }
}

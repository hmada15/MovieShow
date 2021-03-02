<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

if (!function_exists('getApiData')) {
    //Helper function to get data form themoviedb and get token and base url form .env
    function getApiData($route, $arr)
    {
        return Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url') . $route)
            ->json()[$arr];
    }
}

if (!function_exists('getApiDataWithPaginate')) {
    //Helper function to get data, paginate form themoviedb and get token and base url form .env
    function getApiDataWithPaginate($route)
    {
        return Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url') . $route)
            ->json();
    }
}

if (!function_exists('SlugIt')) {
    //get pargraph and return it as slug
    function SlugIt($name)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    }
}

if (!function_exists('UnSlug')) {
    //get pargraph and unslug
    function UnSlug($name)
    {
        return ucfirst(str_replace('-', ' ', $name));
    }
}

if (!function_exists('manualPaginate')) {
    //Manual pagination
    function manualPagination($array, $request)
    {
        $total = $array['total_results'];
        $per_page = count($array['results']);
        $current_page = $request->input("page") ?? 1;
        $current_page = (int) $current_page;
        $array = array_slice($array, 0, 20);
        $paginator =  new Paginator($array, $total, $per_page, $current_page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);
        return $paginator;
    }
}

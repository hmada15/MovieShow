<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $tv_shows = Http::withToken(config('services.tmdp.token'))
                ->get(config('services.tmdp.url').'tv/popular?page='.request()->page)
                ->json()['results'];
        $tv_genresArr =  getApiData('genre/tv/list','genres');
        $tv_genres = collect($tv_genresArr)->mapWithKeys(function($item){
            return [$item['id'] => $item['name']];
        });
        return view("all_tv",compact("tv_shows","tv_genres"));
    }

    public function show($id)
    {

        /* $movie = Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url').'movie/'.$id."?append_to_response=credits,videos")
            ->json();
        $mov_genresArr =  getApiData('genre/movie/list','genres');
        $mov_genres = collect($mov_genresArr)->mapWithKeys(function($item){
            return [$item['id'] => $item['name']];
        });

        return view("movie",compact("movie","mov_genres")); */

        $tv = Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url').'tv/'.$id."?append_to_response=credits,videos")
            ->json();
        $tv_genresArr = getApiData('genre/tv/list','genres');
        $tv_genres =    collect($tv_genresArr)->mapWithKeys(function($item){
            return [$item['id'] => $item['name']];
        });
        /* dd($tv); */
        return view("tv",compact("tv","tv_genres"));
    }

}

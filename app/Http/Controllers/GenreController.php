<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GenreController extends Controller
{

    public function movieShow($id,$slug)
    {
        $movies = Http::withToken(config('services.tmdp.token'))
                ->get(config('services.tmdp.url').
                'discover/movie?language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&with_genres='.$id.'&page='.request()->page)
                ->json()['results'];
        $mov_genresArr =    getApiData('genre/movie/list','genres');
        $mov_genres = collect($mov_genresArr)->mapWithKeys(function($item){
            return [$item['id'] => $item['name']];
        });

    return view("movie_genre",compact("movies","mov_genres","slug"));
    }

    public function tvShow($id,$slug)
    {
        $tv_shows = Http::withToken(config('services.tmdp.token'))
                ->get(config('services.tmdp.url').
                'discover/tv?language=en-US&sort_by=popularity.desc&with_genres='.$id.'&page='.request()->page)
                ->json()['results'];
        $tv_genresArr = getApiData('genre/tv/list','genres');
        $tv_genres =    collect($tv_genresArr)->mapWithKeys(function($item){
                    return [$item['id'] => $item['name']];
                });


    return view("tv_genre",compact("tv_shows","tv_genres","slug"));
    }

}

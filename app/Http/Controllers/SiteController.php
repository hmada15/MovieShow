<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{

    public function welcome()
    {
        //Custom helper function
        $populars_mov =     getApiData('movie/popular', 'results');
        $top_rated =        getApiData('movie/top_rated', 'results');
        $mov_genresArr =    getApiData('genre/movie/list', 'genres');
        $tv_genresArr =     getApiData('genre/tv/list', 'genres');
        $populars_tv =      getApiData('tv/popular', 'results');

        $mov_genres = collect($mov_genresArr)->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        $tv_genres = collect($tv_genresArr)->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        return view('index', compact('populars_mov', 'top_rated', 'populars_tv', 'mov_genres', 'tv_genres'));
    }
}

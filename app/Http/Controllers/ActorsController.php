<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $actors_data = Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url') . 'person/popular?page=' . request()->page)
            ->json();

        //Custom helper function
        $actors = manualPagination($actors_data, $request);

        return view("all_actors", compact("actors"));
    }

    public function show($id, $slug)
    {
        $actor = Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url') . 'person/' . $id)
            ->json();
        $moviesArr = Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url') . 'person/' . $id . '/movie_credits')
            ->json()['cast'];
        $movies = collect($moviesArr)->sortByDesc('popularity');

        $mov_genresArr =    getApiData('genre/movie/list', 'genres');
        $mov_genres = collect($mov_genresArr)->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        $tvArr = Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url') . 'person/' . $id . '/tv_credits')
            ->json()['cast'];
        $tvs = collect($tvArr)->sortByDesc('popularity');

        $tv_genresArr =    getApiData('genre/tv/list', 'genres');
        $tv_genres = collect($mov_genresArr)->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        return view("actor", compact("actor", "movies", "mov_genres", "tvs", "tv_genresArr", "tv_genres"));
    }
}

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
    public function index(Request $request)
    {
        $tv_shows_data = Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url') . 'tv/popular?page=' . request()->page)
            ->json();

        //Custom helper function
        $tv_shows = manualPagination($tv_shows_data, $request);

        $tv_genresArr =  getApiData('genre/tv/list', 'genres');

        $tv_genres = collect($tv_genresArr)->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        return view("all_tv", compact("tv_shows", "tv_genres"));
    }

    public function show($id)
    {
        $tv = Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url') . 'tv/' . $id . "?append_to_response=credits,videos")
            ->json();

        $tv_genresArr = getApiData('genre/tv/list', 'genres');

        $tv_genres =    collect($tv_genresArr)->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        return view("tv", compact("tv", "tv_genres"));
    }
}

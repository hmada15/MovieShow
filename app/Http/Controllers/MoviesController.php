<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Http::withToken(config('services.tmdp.token'))
                ->get(config('services.tmdp.url').'movie/popular?page='.request()->page)
                ->json()['results'];
        $mov_genresArr =    getApiData('genre/movie/list','genres');
        $mov_genres = collect($mov_genresArr)->mapWithKeys(function($item){
            return [$item['id'] => $item['name']];
        });

        return view("all_movies",compact("movies","mov_genres"));
    }


    public function show($id,$slug)
    {
        $movie = Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url').'movie/'.$id."?append_to_response=credits,videos")
            ->json();
        $mov_genresArr =  getApiData('genre/movie/list','genres');
        $mov_genres = collect($mov_genresArr)->mapWithKeys(function($item){
            return [$item['id'] => $item['name']];
        });

        return view("movie",compact("movie","mov_genres"));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{

    public function welcome(){
        //Custom helper function
        $populars_mov =     getApiData('movie/popular','results');
        $top_rated =        getApiData('movie/top_rated','results');
        $mov_genresArr =    getApiData('genre/movie/list','genres');
        $tv_genresArr =     getApiData('genre/tv/list','genres');
        $populars_tv =      getApiData('tv/popular','results');

        $mov_genres = collect($mov_genresArr)->mapWithKeys(function($item){
            return [$item['id'] => $item['name']];
        });

        $tv_genres = collect($tv_genresArr)->mapWithKeys(function($item){
            return [$item['id'] => $item['name']];
        });

        /* dd($populars_tv); */
        return view('index',compact('populars_mov','top_rated','populars_tv','mov_genres','tv_genres'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

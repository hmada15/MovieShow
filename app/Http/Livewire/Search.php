<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class Search extends Component
{

    public $search = '';

    public function render()
    {
        $movies = Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url').'search/movie?query='.$this->search)
            ->json();

        $tv_shows = Http::withToken(config('services.tmdp.token'))
            ->get(config('services.tmdp.url').'search/tv?query='.$this->search)
            ->json();

        return view('livewire.search',compact("movies","tv_shows"));
    }
}

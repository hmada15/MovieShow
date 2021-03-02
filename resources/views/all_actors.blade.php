@extends('layouts.main')
@section('title')
<title>Actors - MoviesShow</title>
@endsection
@section('style')
    <style>

    </style>
@endsection

@section('content')

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
        <h1 class="h5 mb-0 text-gray-900">Popular People</h1>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                @foreach ($actors['results'] as $actor)
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card p-card shadow border-0">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <a href="{{route("actor.show",[$actor["id"],SlugIt($actor["name"])])}}">
                                        <img src="https://image.tmdb.org/t/p/w500{{$actor["profile_path"]}}" class="card-img"/>
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="{{route("actor.show",[$actor["id"],SlugIt($actor["name"])])}}">
                                           <h5 class="card-title text-gray-900">{{$actor["name"]}}</h5>
                                         </a>
                                        <p class="card-text"><strong>Known for:</strong><br>
                                            @foreach($actor["known_for"] as $movie)
                                                @isset($movie["title"])
                                                <a href="{{route("movie.show",[$movie['id'],SlugIt($movie['title'])])}}">
                                                    {{$movie['title']??''}}<br>
                                                </a>
                                                @endisset
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$actors->links()}}
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection

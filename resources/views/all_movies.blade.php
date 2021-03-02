@extends('layouts.main')
@section('title')
<title>Movies - MoviesShow</title>
@endsection
@section('style')
    <style>

    </style>
@endsection

@section('content')

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
        <h1 class="h5 mb-0 text-gray-900">Movies</h1>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                @foreach ($movies['results'] as $movie)
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card m-card shadow border-0">
                            <div class="m-card-cover">
                                <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                    <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-success"></i> {{$movie["vote_average"] ?? ""}}</h6>
                                    <small class="text-muted">{{$movie["popularity"] ?? ""}}</small>
                                </div>
                                <a href="{{route("movie.show",[$movie['id'],SlugIt($movie['title'])])}}">
                                    <img src="https://image.tmdb.org/t/p/w500/.{{$movie["poster_path"]}}" class="card-img-top" alt="{{SlugIt($movie['title'])}}" />
                                </a>
                            </div>
                            <div class="card-body p-3">
                                <a href="{{route("movie.show",[$movie['id'],SlugIt($movie['title'])])}}">
                                    <h5 class="card-title text-gray-900 mb-1">{{$movie["title"]}}</h5>
                                </a>
                                <p class="card-text">
                                    @foreach ($movie['genre_ids'] as $gen)
                                    <a href="{{route("movie_genre.show",[$gen,SlugIt($mov_genres->get($gen))])}}">
                                        <small style="color: black;">{{$mov_genres->get($gen)}}</small>
                                    </a>
                                    @endforeach

                                    <br>
                                    <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> {{$movie["release_date"] ?? ""}}</small>

                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$movies->links()}}
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection

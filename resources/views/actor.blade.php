@extends('layouts.main')
@section('title')
<title>{{$actor["name"]}} - MoviesShow</title>
@endsection
@section('style')
    <style>

    </style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-3">
            <div class="bg-white p-3 widget shadow rounded mb-4">
                <img src="https://image.tmdb.org/t/p/w500{{$actor["profile_path"]}}" class="img-fluid rounded"/>
                <h1 class="h6 mb-3 mt-3 font-weight-bold text-gray-900">Personal Info</h1>
                <p class="mb-2"><i class="fas fa-user-circle fa-fw"></i> Known For - {{$actor["known_for_department"]}}</p>
                <p class="mb-2"><i class="fas fa-venus-mars fa-fw"></i> Gender -
                    @switch($actor["gender"])
                    @case(1)Female @break @case(2)Male @break @default Not specified
                    @endswitch
                </p>
                <p class="mb-2"><i class="fas fa-calendar-alt fa-fw"></i> Date of Birth - {{$actor["birthday"]}}</p>
                <p class="mb-2"><i class="fas fa-map-marker-alt fa-fw"></i> {{$actor["place_of_birth"]}}</p>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9">
            <div class="bg-white info-header shadow rounded mb-4">
                <div class="row d-flex align-items-center justify-content-between p-3 border-bottom">
                    <div class="col-lg-7 m-b-4">
                        <h3 class="text-gray-900 mb-0 mt-0 font-weight-bold">{{$actor["name"]}}</h3>
                        <p class="mb-0 text-gray-800">
                            <small class="text-muted"><i class="fas fa-user-circle fa-fw fa-sm mr-1"></i> {{$actor["known_for_department"]}}</small>
                        </p>
                    </div>
                    <div class="col-lg-5 text-right">
                        <a href="https://askbootstrap.com/preview/bookishow/people-detail.html#" class="btn btn-primary btn-circle">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://askbootstrap.com/preview/bookishow/people-detail.html#" class="btn btn-danger btn-circle">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://askbootstrap.com/preview/bookishow/people-detail.html#" class="btn btn-warning btn-circle">
                            <i class="fab fa-snapchat-ghost"></i>
                        </a>
                        <a href="https://askbootstrap.com/preview/bookishow/people-detail.html#" class="btn btn-info btn-circle">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
                <div class="p-3 mb-4">
                    <h1 class="h6 mb-3 mt-0 font-weight-bold text-gray-900">Biography</h1>
                    <div>
                        <p class="mb-0 text-gray-600">
                           {{$actor["biography"]}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-3 widget shadow rounded mb-4">
                <h1 class="h6 mb-3 mt-0 font-weight-bold text-gray-900">Movies</h1>
                <div class="row">
                    @foreach ($movies as $movie)

                    <div class="col-xl-3 col-md-6">
                        <div class="card m-card shadow border-0">
                            <a href="{{route("movie.show",[$movie['id'],SlugIt($movie['title'])])}}">
                                <div class="m-card-cover">
                                    <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                        <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-thumbs-up text-success"></i> {{$movie["vote_average"]}}</h6>
                                        <small class="text-muted">{{$movie["popularity"]}}</small>
                                    </div>
                                    @isset($movie["poster_path"])
                                    <img src="https://image.tmdb.org/t/p/w500/.{{$movie["poster_path"]}}" class="card-img-top"/>
                                    @else
                                    <img class="w-100" src="{{asset("img/movi_placeholder.png")}}">
                                    @endisset
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
                                        <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> {{$movie["release_date"]??""}}</small>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @if ($loop->iteration == 4) @break @endif

                    @endforeach

                </div>
                <h1 class="h6 mb-3 mt-0 font-weight-bold text-gray-900 mt-4">TV Show</h1>
                <div class="row">
                    @foreach ($tvs as $tv)

                    <div class="col-xl-3 col-md-6">
                        <div class="card m-card shadow border-0">
                            <a href="{{route("tv.show",[$tv['id'],SlugIt($tv['original_name'])])}}">
                                <div class="m-card-cover">
                                    <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                        <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-thumbs-up text-success"></i> {{$tv["vote_average"]}}</h6>
                                        <small class="text-muted">{{$tv["popularity"]}}</small>
                                    </div>
                                    @isset($tv["poster_path"])
                                    <img src="https://image.tmdb.org/t/p/w500/.{{$tv["poster_path"]}}" class="card-img-top"/>
                                    @else
                                    <img class="w-100" src="{{asset("img/movi_placeholder.png")}}">
                                    @endisset
                                </div>
                                <div class="card-body p-3">
                                    <a href="{{route("tv.show",[$tv['id'],SlugIt($tv['original_name'])])}}">
                                        <h5 class="card-title text-gray-900 mb-1">{{$tv["original_name"]}}</h5>
                                    </a>
                                    <p class="card-text">
                                        @foreach ($tv['genre_ids'] as $gen)
                                        <a href="{{route("tv_genre.show",[$gen,SlugIt($tv_genres->get($gen))])}}">
                                            <small style="color: black;">{{$tv_genres->get($gen)}}</small>
                                        </a>
                                        @endforeach
                                        <br>
                                        <small class="text-danger"><i class="fas fa-calendar-alt fa-sm text-gray-400"></i> {{$tv["release_date"]??""}}</small>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @if ($loop->iteration == 4) @break @endif

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection

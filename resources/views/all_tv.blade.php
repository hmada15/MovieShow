@extends('layouts.main')
@section('title')
<title>TV Show - MoviesShow</title>
@endsection
@section('style')
    <style>

    </style>
@endsection

@section('content')

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
        <h1 class="h5 mb-0 text-gray-900">Tv Show</h1>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                @foreach ($tv_shows as $tv)
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card m-card shadow border-0">

                            <div class="m-card-cover">
                                <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                    <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-success"></i>{{$tv["vote_average"]}}</h6>
                                    <small class="text-muted">{{$tv["popularity"]}}</small>
                                </div>
                                <a href="{{route("tv.show",[$tv["id"],SlugIt($tv['name'])])}}">
                                    <img src="https://image.tmdb.org/t/p/w500/.{{$tv["poster_path"]}}" class="card-img-top"/>
                                </a>
                            </div>
                            <div class="card-body p-3">
                                <a href="{{route("tv.show",[$tv["id"],SlugIt($tv['name'])])}}">
                                    <h5 class="card-title text-gray-900 mb-1">{{$tv["name"]}}</h5>
                                </a>
                                <p class="card-text">
                                    @foreach ($tv['genre_ids'] as $gen)
                                    <a href="{{route("tv_genre.show",[$gen,SlugIt($tv_genres->get($gen))])}}">
                                        <small style="color: black;">{{$tv_genres->get($gen)}}</small>
                                    </a>
                                    @endforeach
                                    <br>
                                    <p class="text-danger"><i class="fas fa-calendar-alt fa-sm"></i> {{$tv["first_air_date"]}}</p>
                                </p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mb-4" id="light-pagination"></div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection

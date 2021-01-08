@extends('layouts.main')
@section('title')
<title>MovieShow</title>
@endsection
@section('style')
    <style>
        .carousel {
            width: 90%;
            margin: 0px auto;
        }
        .carousel div{
            display: inline;
        }
        .slick-slide {
            margin: 10px;
        }
        .slick-slide img {
            width: 100%;
            border: 2px solid #fff;
        }
        .wrapper{
            width:100%;
            padding-top: 20px;
            text-align:center;
        }
        .card-img-top{
            transition-duration: .15s;
        }
        
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mt-1 my-4">
            <h1 class="h5 mb-0">Popular Movies</h1>
        </div>
        <div class="wrapper">
            <div class="carousel12">
                @foreach ($populars_mov as $popular)
                {{-- SlugIt is a custom helper function --}}
                <a href="{{route("movie.show",[$popular['id'],SlugIt($popular['title'])])}}">
                    <div><img class="img-fluid rounded" src="https://image.tmdb.org/t/p/w500/.{{$popular["poster_path"]}}"></div>
                </a>
                    @if ($loop->iteration == 9) @break @endif
                @endforeach
            </div>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
            <h1 class="h5 mb-0 ">Top Rated Movies</h1>
            <a href="{{route("movies.index")}}" class="d-none d-sm-inline-block text-xs">View All <i class="fas fa-eye fa-sm"></i></a>
        </div>

        <div class="row">
            @foreach ($top_rated as $rated)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card m-card shadow border-0">
                        <div class="m-card-cover">
                            <div class="position-absolute bg-white shadow-sm rounded text-center p-2 m-2 love-box">
                                <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart text-success"></i>{{$rated["vote_average"]}}</h6>
                                <small class="text-muted">{{$rated["popularity"]}}</small>
                            </div>
                            <a href="{{route("movie.show",[$rated['id'],SlugIt($rated['title'])])}}">
                                <img src="https://image.tmdb.org/t/p/w500/.{{$rated["poster_path"]}}" class="card-img-top" />
                            </a>
                        </div>
                        <div class="card-body p-3">
                            <a href="{{route("movie.show",[$rated['id'],SlugIt($rated['title'])])}}">
                                <h5 class="card-title text-gray-900 mb-1">{{$rated["title"]}}</h5>
                            </a>
                            <p class="card-text">
                                @foreach ($rated['genre_ids'] as $gen)
                                <a href="{{route("movie_genre.show",[$gen,SlugIt($mov_genres->get($gen))])}}">
                                    <small style="color: black;">{{$mov_genres->get($gen)}}</small>
                                </a>
                                @endforeach
                                <br>
                                <small class="text-danger"><i class="fas fa-calendar-alt fa-sm"></i> {{$rated["release_date"]}}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @if ($loop->iteration == 16) @break @endif
            @endforeach
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
            <h1 class="h5 mb-0 mt-4 ">Popular TV Show</h1>
            <a href="{{route("movies.index")}}" class="d-none d-sm-inline-block text-xs">View All <i class="fas fa-eye fa-sm"></i></a>
        </div>

        <div class="row">
            @foreach ($populars_tv as $tv)
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
                                <small class="text-danger"><i class="fas fa-calendar-alt fa-sm"></i> {{$tv["first_air_date"]}}</small>
                            </p>
                        </div>

                    </div>
                </div>
            @if ($loop->iteration == 16) @break @endif
            @endforeach
        </div>

        {{-- <div class="text-center mt-1 mb-4">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
    </div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $(".carousel12").slick({
            slidesToShow: 3,
            dots: true,
            centerMode: true,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });
</script>

@endsection

@extends('layouts.main')
@section('title')
<title>{{$movie["title"]}} - MoviesShow</title>
@endsection
@section('style')
    <style>

    </style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="cover-pic">
                <div class="position-absolute bg-white shadow-sm rounded text-center p-2  love-box" style="margin: 2.5rem">
                    <h6 class="text-gray-900 mb-0 font-weight-bold"><i class="fas fa-heart
 text-success"></i> {{$movie["vote_average"]}}</h6>
                    <small class="text-muted">{{$movie["popularity"]}}</small>
                </div>
                <img src="https://image.tmdb.org/t/p/original/.{{$movie["backdrop_path"]}}" class="img-fluid"/>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3">
            <div class="bg-white p-3 widget shadow rounded mb-4">
                <img src="https://image.tmdb.org/t/p/w500/.{{$movie["poster_path"]}}" class="img-fluid rounded"/>
                <h1 class="h6 mb-0 mt-3 font-weight-bold text-gray-900">Director</h1>
                <p>{{$movie["credits"]["crew"]["6"]["name"]  ??""}}</p>
                <h1 class="h6 mb-0 mt-3 font-weight-bold text-gray-900">Writers</h1>
                <p>{{$movie["credits"]["crew"]["11"]["name"]  ??""}}</p>
                <h1 class="h6 mb-0 mt-3 font-weight-bold text-gray-900">Cast</h1>
                <p>
                    @foreach ($movie["credits"]["cast"] as $cast)
                        {{$cast["name"]}},
                        @if ($loop->iteration == 6) @break @endif
                    @endforeach
                    Tom Holland,Jake Gyllenhaal,Zendaya

                </p>
                <h1 class="h6 mb-0 mt-3 font-weight-bold text-gray-900">Plot</h1>
                <p class="mb-0">{{$movie["overview"]}}</p>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9">
            <div class="bg-white info-header shadow rounded mb-4">
                <div class="row d-flex align-items-center justify-content-between p-3 border-bottom">
                    <div class="col-lg-7 m-b-4">
                        <h3 class="text-gray-900 mb-0 mt-0 font-weight-bold">{{$movie["title"]}} <small>{{$movie["release_date"]}}</small></h3>
                        <p class="mb-0 text-gray-800">
                            <small class="text-muted"><i class="fas fa-film fa-fw fa-sm mr-1"></i>
                                @foreach ($movie['genres'] as $gen)
                                <a href="{{route("movie_genre.show",[$gen['id'],SlugIt($gen['name'])])}}">
                                        <small style="color: black;">{{$gen['name']}}</small>
                                    </a>
                                @endforeach
                            </small>
                        </p>
                    </div>
                    <div class="col-lg-5 text-right">
                        <a href="#" class="d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-share-alt"></i></a>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-between py-3 px-4">
                    <div class="col-lg-6 m-b-4">
                        <p class="mb-0 text-gray-900"><i class="fas fa-money-bill fa-sm fa-fw mr-1"></i> BUDGET - <span class="text-white rounded px-2 py-1 bg-info">$@money($movie["budget"])</span></p>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="#" class="btn btn-sm btn-primary btn-circle">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger btn-circle">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-warning btn-circle">
                            <i class="fab fa-snapchat-ghost"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-info btn-circle">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-white p-3 widget shadow rounded mb-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active cursor-pointer" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            Summary
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cursor-pointer" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                            Cast
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cursor-pointer" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">
                            Videos
                        </a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <p>
                            {{$movie["overview"]}}
                        </p>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">

                            <div class="col-lg-6">
                                <h5 class="h6 mt-0 mb-3 font-weight-bold text-gray-900">CAST</h5>
                                @foreach ($movie["credits"]["cast"] as $cast)
                                    <div class="artist-list mb-3">
                                        <a class="d-flex align-items-center" href="{{route("actor.show",[$cast["id"],SlugIt($cast["name"])])}}">
                                            <div class="dropdown-list-image mr-3">

                                                @isset($cast["profile_path"])
                                                <img class="actor-img" src="https://image.tmdb.org/t/p/w45/.{{$cast["profile_path"]}}"/>
                                                @else
                                                <img class="actor-img" src="https://image.shutterstock.com/image-illustration/male-default-avatar-profile-gray-260nw-582509302.jpg">
                                                @endisset
                                                <div class="status-indicator bg-success"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate">{{$cast["name"]}}</div>
                                                <div class="small text-gray-500">Actor</div>
                                            </div>
                                        </a>
                                    </div>
                                    @if ($loop->iteration == 6) @break @endif
                                @endforeach
                            </div>

                            <div class="col-lg-6">
                                <h5 class="h6 mt-0 mb-3 font-weight-bold text-gray-900">CREW</h5>
                                @foreach ($movie["credits"]["crew"] as $crew)
                                    <div class="artist-list mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="dropdown-list-image mr-3">
                                                @isset($crew["profile_path"])
                                                <img class="actor-img" src="https://image.tmdb.org/t/p/w45/.{{$crew["profile_path"]}}"/>
                                                @else
                                                <img class="actor-img" src="https://image.shutterstock.com/image-illustration/male-default-avatar-profile-gray-260nw-582509302.jpg">
                                                @endisset
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate">{{$crew["name"]}}</div>
                                                <div class="small text-gray-500">{{$crew["department"]}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($loop->iteration == 6) @break @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                        <div class="row">
                            @foreach ($movie["videos"]["results"] as $video)
                                <div class="col-xl-6 col-lg-6">
                                    <div class="mb-4">
                                        <iframe
                                            width="100%"
                                            height="215"
                                            src="https://www.youtube.com/embed/{{$video["key"]}}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen=""
                                        ></iframe>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection


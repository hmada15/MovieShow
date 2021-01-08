<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="" />

        <meta name="author" content="moahmed elkased"/>
        <meta name="developer" content="Mohamed elkased">
        <meta name="developer-email" content="info@mohamed-elkased.com">

        <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}"/>
        {{-- title --}}
        @yield('title')
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        @yield('style')
        @livewireStyles
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg container">
            <a class="navbar-brand" href="{{route("index")}}">
                <img style="margin-right: 3rem " src="{{asset("img/logo1.png")}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border: solid 1px white;">
                <i style="color: #fff" class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("index")}}" @if (\Request::is('/'))active @endif>Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("movies.index")}}" @if (\Request::is('moveis'))active @endif>Moveis <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("tv.index")}}" @if (\Request::is('tv'))active @endif>TV Shows <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("actor.index")}}" @if (\Request::is('actors'))active @endif>Actors <span class="sr-only"></span></a>
                    </li>
                </ul>
                <livewire:search />
            </div>
        </nav>
        <div id="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">

                     @yield('content')

                </div>
                <footer class="sticky-footer " style="background-color: #1a202c;">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span style="color: #eee;">Made with <i class="fas fa-heart fa-fw text-danger"></i> by <a style="color: #4e73df!important" target="_blank" href="https://www.linkedin.com/in/mohamed-ali-79365a17b">Mohamed Elkased</a></span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

        {{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div> --}}

        <script src="{{ asset('js/script.js') }}" ></script>

        <script>
            $('#light-pagination').pagination({
                pages: 500,
                cssStyle: 'dark-theme',

                @isset(request()->page)
                    currentPage:{{request()->page}}
                @endisset

            });
            $('body').click(function() {
                $('.search-drop').hide();
            });

        </script>
        @yield('script')
        @livewireScripts
    </body>
</html>

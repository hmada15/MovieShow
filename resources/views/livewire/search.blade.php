<div>
    <form class="form-inline my-2 my-lg-0">
        <input wire:model.depounce.300ms="search" class="form-control mr-sm-2" type="search" placeholder="Search"
            aria-label="Search">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <div class="position-absolute search-drop">
        <ul>
            @isset($movies['results'])
                @foreach ($movies['results'] as $movie)
                    <li>
                        <a href="{{ route('movie.show', [$movie['id'], SlugIt($movie['title'])]) }}">
                            @isset($movie['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w45/.{{ $movie['poster_path'] }}" />
                            @else
                                <img src="{{ asset('img/movi_placeholder.png') }}">
                            @endisset
                            <span>{{ $movie['title'] }}</span>
                            <p>{{ $movie['release_date'] ?? '' }}</p>
                        </a>
                    </li>
                    @if ($loop->iteration == 3) @break @endif
                @endforeach
            @endisset

            @isset($tv_shows['results'])
                @foreach ($tv_shows['results'] as $tv)
                    <li>
                        <a href="{{ route('tv.show', [$tv['id'], SlugIt($tv['original_name'])]) }}">
                            @isset($tv['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w45/.{{ $tv['poster_path'] }}" />
                            @else
                                <img src="{{ asset('img/movi_placeholder.png') }}">
                            @endisset
                            <span>{{ $tv['name'] }}</span>
                            <p>{{ $tv['first_air_date'] ?? '' }}</p>
                        </a>
                    </li>
                    @if ($loop->iteration == 3) @break @endif
                @endforeach
            @endisset

        </ul>

    </div>
</div>

# MovieShow

A site that displays the latest movies and series and some information about them, such as actors and staff

Live Demo: http://movieshow.mohamed-elkased.com

## Installation

1. Clone the repository `git clone https://github.com/hmada15/MovieShow.git MovieShow`
1. `composer install`
1. Rename `.env.example` file to `.env` `cp .env.example .env`
1. Set your `TMDb_TOKEN` in your `.env` file. You can get an API Read Access Token (v4 auth) [here](https://www.themoviedb.org/documentation/api).
1. (optionally) Set  `TMDb_URL` in your `.env` file. You can get it from  [here](https://www.themoviedb.org/documentation/api). It will look something like that. `https://api.themoviedb.org/3/`
1. `php artisan key:generate`
1. `php artisan serve`
1. Visit `localhost:8000` in your browser

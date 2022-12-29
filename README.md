<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Install

##For local environment
- composer install
- npm install
- php artisan key:generate
- PHP server : php artisan serve
- Build assets : npm run build

*for edit scss file use npm run dev*

##For production environment

- Step 1 : build assets in local : npm run build
- Step 2 : upload website
- Step 3 : rename .env.example by .env then edit APP_ENV in 'production'
- Step 4 : .env edit OMDB_API_KEY by your api key (https://www.omdbapi.com/)
- Step 5 : composer install
- Step 6 : php artisan key:generate

*your domain must point to /public/index.php*

##Version

- PHP : 8.2.0




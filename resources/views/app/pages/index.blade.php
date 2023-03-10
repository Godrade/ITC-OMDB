@extends('app.layouts.default')

@section('title' , 'Home')
@section('metaHead')
    <meta property="og:url" content="{{ route('app.index')}}"/>
@endsection

@section('content')
    <main>
        <section class="container position-absolute top-50 start-50 translate-middle">
            <div class="row illustration-container align-items-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <img src="{{ asset('assets/images/illustration/movie-night-amico.svg') }}" width="80%" alt="Un couple sur un canapé avec des pop-corn">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <h1 class="h1">Welcome to ITC-OMDB</h1>
                    <p>
                        <strong>ITC-OMDB</strong> is the world's most popular and authoritative source for movie, TV and celebrity
                        content. Find ratings and reviews for the newest movie and TV shows.
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection

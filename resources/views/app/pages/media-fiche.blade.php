@extends('app.layouts.default')

@section('title' , 'Home')
@section('metaHead')
    <meta property="og:url" content="{{ route('app.index')}}"/>
@endsection

@section('content')
    <main>
        <section class="container mt-5 mb-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 fiche-picture-container">
                    <img class="rounded-3 fiche-picture"
                         src="{{ $media['Poster'] != 'N/A' ? $media['Poster'] : asset('assets/images/default-picture.jpg') }}"
                         width="100%" alt="{{ $media['Title'] }}">
                    <span
                        class="badge rounded-pill bg-secondary position-absolute top-0 start-0 mt-2 ms-4">{{ $media['Type'] }}</span>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 mt-md-3 position-relative">
                    <h1 class="h2 text-bold text-white">{{ $media['Title'] }}</h1>
                    <span>{{ $media['Year'] }} - {{ $media['Runtime'] }}</span>

                    <div class="mt-2">
                        @foreach($media['Genre'] as $genre)
                            <span class="badge rounded-pill bg-secondary">{{ $genre }}</span>
                        @endforeach
                    </div>

                    <div class="mt-5 mb-5">
                        <p class="fiche-description">
                            {{ Str::limit($media['Plot'], 700) }}
                        </p>
                    </div>

                    <div class="fiche-score-container w-100">
                        <span class="text-uppercase fiche-score-text">score</span>
                        <div class="mt-3 d-flex justify-content-evenly">
                            @if(empty($media['Ratings']))
                                <span>No score available</span>
                            @endif
                            @foreach($media['Ratings'] as $rating)
                                <div class="text-center">
                                    <span class="d-block fiche-score-value">{{ $rating['Value'] }}</span>
                                    <span class="fiche-score-source">{{ $rating['Source'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <h3 class="mt-5 text-uppercase">Information</h3>
                <div class="fiche-separator"></div>

                <ul class="list-unstyled fiche-ul">
                    @if(!empty($media['Director']))
                        <li><span class="fiche-info-title">Director</span> {{ $media['Director'] }} </li>@endif
                    @if(!empty($media['Writer']))
                        <li><span class="fiche-info-title">Scenario</span> {{ $media['Writer'] }} </li>@endif
                    @if(!empty($media['Actors']))
                        <li><span class="fiche-info-title">Actors</span> {{ $media['Actors'] }}</li>@endif
                    @if(!empty($media['Language']))
                        <li><span class="fiche-info-title">Language</span> {{ $media['Language'] }}</li>@endif
                    @if(!empty($media['Country']))
                        <li><span class="fiche-info-title">Country</span> {{ $media['Country'] }}</li>@endif
                </ul>

                <ul class="list-unstyled fiche-ul">
                    @if(!empty($media['totalSeasons']))
                        <li><span class="fiche-info-title">Total Seasons</span> {{ $media['totalSeasons'] }} </li>@endif
                        @if(!empty($media['Rated']))
                            <li><span class="fiche-info-title">Rated</span> {{ $media['Rated'] }} </li>@endif
                        @if(!empty($media['Released']))
                            <li><span class="fiche-info-title">Released</span> {{ $media['Released'] }} </li>@endif
                        @if(!empty($media['Awards']))
                            <li><span class="fiche-info-title">Awards</span> {{ $media['Awards'] }}</li>@endif
                        @if(!empty($media['DVD']))
                            <li><span class="fiche-info-title">DVD release</span> {{ $media['DVD'] }}</li>@endif
                        @if(!empty($media['BoxOffice']))
                            <li><span class="fiche-info-title">Box Office</span> {{ $media['BoxOffice'] }} </li>@endif
                </ul>

            </div>
        </section>
    </main>
@endsection

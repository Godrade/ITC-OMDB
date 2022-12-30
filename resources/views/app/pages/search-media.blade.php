@extends('app.layouts.default')

@section('title' , 'Home')
@section('metaHead')
    <meta property="og:url" content="{{ route('app.index')}}"/>
@endsection

@section('content')
    <main>
        <section class="container mt-5 mb-5">
            <div class="row">
                <h3 class="h3 mb-0">Movie(s)</h3>
                @if(!empty($mediaListed['movie']['Error']))
                    <span>{{ $mediaListed['movie']['Error'] }}</span>
                @else
                    <span class="mb-2">Number of results : {{ $mediaListed['movie']['totalResults'] }}</span>
                    @foreach($mediaListed['movie']['Search'] as $movie)
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3 mb-3 position-relative">
                            <a href="{{ route('app.fiche', ['type' => $movie['Type'], 'omdbID' => $movie['imdbID']]) }}"
                               class="media-container">
                                <img
                                    src="{{ $movie['Poster'] != 'N/A' ? $movie['Poster'] : asset('assets/images/default-picture.jpg') }}"
                                    alt="{{ $movie['Title'] }}">
                                <span
                                    class="badge bg-primary position-absolute top-0 start-0 mt-2 ms-3">{{ $movie['Year'] }}</span>
                            </a>
                            <span class="media-title">{{ $movie['Title'] }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row mt-5 mb-3">
                <h3 class="h3 mb-0">Serie(s)</h3>
                @if(!empty($mediaListed['series']['Error']))
                    <span>{{ $mediaListed['series']['Error'] }}</span>
                @else
                    <span
                        class="mb-2">Number of results : {{ $mediaListed['series']['totalResults'] }}</span>
                    @foreach($mediaListed['series']['Search'] as $serie)
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3 mb-3 position-relative">
                            <a href="{{ route('app.fiche', ['type' => $serie['Type'], 'omdbID' => $serie['imdbID']]) }}"
                               class="media-container">
                                <img
                                    src="{{ $serie['Poster'] != 'N/A' ? $serie['Poster'] : asset('assets/images/default-picture.jpg') }}"
                                    alt="{{ $serie['Title'] }}">
                                <span
                                    class="badge bg-primary position-absolute top-0 start-0 mt-2 ms-3">{{ $serie['Year'] }}</span>
                            </a>
                            <span class="media-title">{{ $serie['Title'] }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $pagination['index'] == 1 ? 'disabled': ''  }}">
                                <a class="page-link" href="{{ route('app.search', ['omdbName' => $pagination['mediaData']['omdbName'], 'pageID' => $pagination['previousIndex']]) }}" tabindex="-1" aria-disabled="false">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="{{ route('app.search', ['omdbName' => $pagination['mediaData']['omdbName'], 'pageID' => 1]) }}">1</a></li>
                            <li class="page-item"><a class="page-link disabled" href="#">{{ $pagination['index'] }}</a></li>
                            <li class="page-item"><a class="page-link" href="{{ route('app.search', ['omdbName' => $pagination['mediaData']['omdbName'], 'pageID' => $pagination['maxIndex']]) }}">{{ $pagination['maxIndex'] }}</a></li>

                            <li class="page-item {{ $pagination['nextIndex'] == 1 ? 'disabled': ''  }}">
                                <a class="page-link" href="{{ route('app.search', ['omdbName' => $pagination['mediaData']['omdbName'], 'pageID' => $pagination['nextIndex']]) }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </main>
@endsection

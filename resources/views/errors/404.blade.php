@extends('app.layouts.default')
@section('title', __('Not Found'))

@section('content')
    <main>
        <section class="container position-absolute top-50 start-50 translate-middle">
            <div class="row align-items-center">
                <div class="col-6">
                    <img src="{{ asset('assets/images/error/error.svg') }}" width="80%"
                         alt="Person in front of an error screen holding his head">
                </div>
                <div class="col-6">
                    <h1 class="h1 text-white mb-3">Page not found</h1>
                    <a href="{{ url(route('app.index'))->previous() }}" class="btn btn-light">Back to home</a>
                </div>
            </div>
        </section>
    </main>
@endsection

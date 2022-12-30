@extends('app.layouts.default')
@section('title', __('Unauthorized'))

@section('content')
    <main>
        <section class="container position-absolute top-50 start-50 translate-middle">
            <div class="row illustration-container align-items-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <img src="{{ asset('assets/images/error/error.svg') }}" width="80%"
                         alt="Person in front of an error screen holding his head">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <h1 class="h1 text-white mb-3">Unauthorized</h1>
                    <a href="{{ url()->previous() }}" class="btn btn-light">Back to home</a>
                </div>
            </div>
        </section>
    </main>
@endsection

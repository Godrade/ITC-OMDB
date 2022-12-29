<nav class="navbar navbar-light bg-dark">
    <div class="container">
        <a href="{{ route('app.index') }}" class="navbar-brand">{{ ENV('APP_NAME') }}</a>
        <form class="d-flex position-relative" method="POST" action="{{ route('app.search') }}">
            @csrf
            <input class="form-control me-2" type="search" name="form_name" placeholder="Search for a movie/series"
                   aria-label="Search" autocomplete="off">
            <input type="hidden" name="form_page" value="1">
            <button class="btn position-absolute end-0 me-2" type="submit"><i class="fi fi-rr-search text-white"></i>
            </button>
        </form>
    </div>
</nav>

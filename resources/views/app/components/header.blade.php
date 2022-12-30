<nav class="navbar navbar-light bg-dark">
    <div class="container header-container">
        <a href="{{ route('app.index') }}" class="navbar-brand">{{ ENV('APP_NAME') }}</a>
        <form class="d-flex" id="search-media">
            @csrf
            <div class="input-group">
                <input type="hidden" name="form_page" id="form_page" value="1">
                <input class="form-control rounded-start" type="search" name="form_name" id="form_name"
                       placeholder="Search for a movie/series" aria-label="Search" autocomplete="off" aria-describedby="search-button">
                <button class="btn btn-outline-secondary" type="submit" id="search-button"><i class="fi fi-rr-search text-white"></i></button>
            </div>
        </form>
    </div>
</nav>

<script>
    $("#search-media").submit(function (e) {
        searchMedia(e);
    });

    function searchMedia(e) {
        e.preventDefault();

        //Récupérer les valeurs
        let media = $("#form_name").val();
        media = media || null;

        let page = $("#form_page").val();


        let base_url = '{{ route("app.index") }}';
        let url = `${base_url}/search/${media}/page/${page}`

        window.location.replace(url);
    }
</script>

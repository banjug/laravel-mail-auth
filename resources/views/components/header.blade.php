<header class="container my-5">
    <div class="row flex-column align-items-end">
        @auth
            {{-- la funzione ucfirst di php assicura che l'iniziale del nome in maiuscola --}}
            <h5>Welcome {{ucfirst (Auth::user()->name)}}!</h5>
            <a href="{{route('logout')}}" class="btn btn-outline-secondary btn-sm">LOGOUT</a>
        @endauth
    </div>
    <div class="row justify-content-center">
        <h1>
            Laravel Mail Auth with Videogames
        </h1>
    </div>
</header>
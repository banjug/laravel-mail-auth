@extends('layouts.main-layout')
@section('content')
    <main id="app">

        {{-- controlla e mostra errori --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- i form di registrazione e login vengono mostrati solo se l'utente non è autenticato --}}
        @guest
            <div class="container my-5">
                <div class="row justify-content-center">
                    <h3>
                        Register
                    </h3>
                </div>
                <div class="row justify-content-center">
                    <form action="{{route('register')}}" method="POST">

                        @method('POST')
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                        </div>
                        <input type="submit" value="REGISTER" class="btn btn-primary">
                    </form>
                </div>
            </div>            
            <hr>
            <div class="container my-5">
                <div class="row justify-content-center">
                    <h3>
                        Login
                    </h3>
                </div>
                <div class="row justify-content-center">
                    <form action="{{route('login')}}" method="POST">
                        @method('POST')
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <input type="submit" value="LOGIN" class="btn btn-outline-primary">
                    </form>
                </div>
            </div>
        @else
        <div class="container my-5">
            <div class="row justify-content-center">
                <p>
                    Go to <a href="{{route('games')}}">Games</a>.
                </p>
            </div>
        </div>
        @endguest
    </main>
@endsection
@extends('layouts.main-layout')
@section('content')
    <main id="app">
        @auth
            	<games-component></games-component>
        @endauth
    </main>
@endsection
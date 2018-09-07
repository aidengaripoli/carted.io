@extends('layouts.master')

@section('app')
    @include('layouts.nav')

    <div id="app">
        @yield('content')
    </div>
@endsection

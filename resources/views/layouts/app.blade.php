@extends('layouts.master')

@section('app')
    <div id="app">
        @include('layouts.nav')

        @yield('content')
    </div>
@endsection

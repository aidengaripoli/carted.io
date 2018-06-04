@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-3">
                    @include('dashboard.layouts.nav')
                </div>

                <div class="column is-9">
                    @yield('meme')
                </div>
            </div>
        </div>
    </div>
@endsection

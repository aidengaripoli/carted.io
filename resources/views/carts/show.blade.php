@extends('layouts.app')

@section('content')
    <div class="image-hero">
        <p class="image">
            <img src="{{ $cart->image_url }}">
        </p>
    </div>

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <h1 class="title has-text-centered is-uppercase">{{ $cart->name }}</h1>
                    <div class="card">
                        <div class="card-content">
                            <div class="content">
                                <div class="level">
                                    <div class="level-item has-text-centered">
                                        <div>
                                            <p class="heading">
                                                Size
                                            </p>
                                            <p class="title">
                                                US {{ $cart->size }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="level-item has-text-centered">
                                        <div>
                                            <p class="heading">
                                                Price
                                            </p>
                                            <p class="title">
                                                ${{ $cart->price / 100 }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="level-item has-text-centered">
                                        <div>
                                            <p class="heading">
                                                Site
                                            </p>
                                            <p class="title">
                                                {{ $cart->site }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="section">--}}
    {{--<div class="container">--}}
    {{--<div class="columns">--}}
    {{--<div class="column is-9 is-offset-1">--}}
    {{--<div class="columns">--}}
    {{--<div class="column is-4">--}}
    {{--<p class="image">--}}
    {{--<img src="{{ $cart->image_url }}">--}}
    {{--</p>--}}
    {{--</div>--}}

    {{--<div class="column is-8">--}}


    {{--<h1 class="title">--}}
    {{--{{ $cart->name }}--}}
    {{--</h1>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection

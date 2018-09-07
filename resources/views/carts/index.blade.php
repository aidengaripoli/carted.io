@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns is-multiline">
                @if(count($carts))
                    @foreach($carts as $cart)
                        <div class="column is-6 is-offset-3">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media">
                                        <div class="media-left">
                                            <figure class="image is-128x128">
                                                <img src="{{ $cart->image_url }}" alt="Cart Image">
                                            </figure>
                                        </div>

                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>{{ $cart->name }}</strong> <small>{{ $cart->sku }}</small>
                                                    <br>
                                                    ${{ $cart->price / 100 }}
                                                    <br>
                                                    {{ $cart->created_at->diffForHumans() }}
                                                </p>
                                            </div>

                                            <nav class="level">
                                                <div class="level-left"></div>
                                                <div class="level-right">
                                                    <a href="{{ $cart->path() }}" class="level-item button is-link">Purchase</a>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="column is-6 is-offset-3">
                        <p class="has-text-centered">There are no carts</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

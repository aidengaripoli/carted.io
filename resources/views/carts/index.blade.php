@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @foreach($carts as $cart)
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <img class="mr-3" src="{{ $cart->image_url }}" alt="Cart">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $cart->name }}</h5>
                                    <p>{{ $cart->sku }}</p>
                                    <p>{{ $cart->price }}</p>
                                    <a href="{{ $cart->path() }}" class="btn btn-primary float-right">Purchase</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection

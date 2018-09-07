@extends('dashboard.layouts.master')

@section('page')
    @foreach($cards->data as $card)
        **** **** **** {{ $card->last4 }}
    @endforeach
@endsection

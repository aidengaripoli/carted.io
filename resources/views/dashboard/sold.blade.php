@extends('dashboard.layouts.master')

@section('meme')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Sold
            </p>
        </header>

        <div class="card-content">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <table class="table is-bordered is-striped is-fullwidth is-hoverable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Size (US)</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach(auth()->user()->sold as $cart)
                    <tr>
                        <th>{{ $cart->id }}</th>
                        <td>
                            <a href="{{ $cart->path() }}">
                                {{ $cart->name }}
                            </a>
                        </td>
                        <td>{{ $cart->size }}</td>
                        <td>${{ $cart->price / 100 }}</td>
                        <td>{{ $cart->created_at->toFormattedDateString() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

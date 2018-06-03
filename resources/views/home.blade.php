@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Dashboard
                            </p>
                        </header>

                        <div class="card-content">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

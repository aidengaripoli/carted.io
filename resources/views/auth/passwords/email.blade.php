@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Reset Password
                            </p>
                        </header>

                        <div class="card-content">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="field">
                                    <label class="label" for="email">E-mail Address</label>
                                    <div class="control">
                                        <input id="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" type="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <button type="submit" class="button is-link">Send Password Reset Link</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

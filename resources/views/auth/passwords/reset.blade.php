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

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.request') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="field">
                                    <label class="label" for="email">E-mail Address</label>
                                    <div class="control">
                                        <input id="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" type="email" value="{{ $email ?? old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label" for="password">Password</label>
                                    <div class="control">
                                        <input id="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" name="password" type="password" required>
                                        @if ($errors->has('password'))
                                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label" for="password-confirm">Confirm Password</label>
                                    <div class="control">
                                        <input id="password-confirm" class="input" name="password_confirmation" type="password" required>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <button type="submit" class="button">Reset Password</button>
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

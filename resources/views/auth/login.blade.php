@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Login
                            </p>
                        </header>

                        <div class="card-content">
                            <form method="POST" action="{{ route('login') }}">
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
                                    <label class="label" for="password">Password</label>
                                    <div class="control">
                                        <input id="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" name="password" type="password" value="{{ old('password') }}" required>
                                        @if ($errors->has('password'))
                                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me?
                                        </label>
                                    </div>
                                </div>

                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-link">Login</button>
                                    </div>

                                    <div class="control">
                                        <a href="{{ route('password.request') }}" class="button is-text">
                                            Forgot Your Password?
                                        </a>
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

@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">
                                Register
                            </p>
                        </div>

                        <div class="card-content">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="field">
                                    <label class="label" for="name">Name</label>
                                    <div class="control">
                                        <input id="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" type="text" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <p class="help is-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label" for="email">E-Mail Address</label>
                                    <div class="control">
                                        <input id="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" type="text" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label" for="password">Password</label>
                                    <div class="control">
                                        <input id="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" name="password" type="text" required>
                                        @if ($errors->has('password'))
                                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label" for="password-confirm">Confirm Password</label>
                                    <div class="control">
                                        <input id="password-confirm" class="input" name="password-confirmation" type="text" required>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <button type="submit" class="button is-link">Register</button>
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

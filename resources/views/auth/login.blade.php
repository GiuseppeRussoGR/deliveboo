@extends('layouts.app')

@section('app_style', 'user')

@section('app-vertical-class', '')

@section('vertical-nav-class', '')

@section('app-content-class', 'col-12')

@section('content')
    <div class="row form-row">
        <div class="col-md-12 d-flex form-container">
            <div class="card ">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-12 col-md-6 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>
                            <div class="col-md-12">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

{{--                            <div class="col-md-12">--}}
{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link text-md-left" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
                        </div>

                        <div class="form-group row buttons">
                            <div class="col-3">
                                <a class="btn btn-secondary" href="{{route('home')}}">
                                    <span>Back</span>
                                </a>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


@endsection


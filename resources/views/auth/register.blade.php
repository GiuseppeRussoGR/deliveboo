@extends('layouts.app')

@section('app_style', 'user')

@section('app-vertical-class', '')

@section('vertical-nav-class', '')

@section('app-content-class')
    'col-12'
@endsection

@section('content')
    <div class="row form-row">
        <div class="col-8 form-container">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="company_name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text"
                                       class="form-control @error('company_name') is-invalid @enderror"
                                       name="company_name" value="{{ old('company_name') }}" required
                                       autocomplete="company_name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address"
                                       class="form-control @error('address') is-invalid @enderror" name="address"
                                       value="{{ old('address') }}" required autocomplete="email">

                            <!-- @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="city" class="form-control @error('city') is-invalid @enderror"
                                       name="city" value="{{ old('city') }}" required autocomplete="email">

                            <!-- @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('P. IVA') }}</label>

                            <div class="col-md-6">
                                <input id="p_iva" type="p_iva" class="form-control @error('p_iva') is-invalid @enderror"
                                       name="p_iva" value="{{ old('p_iva') }}" required autocomplete="email">

                            <!-- @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-3 col-md-6">
                                <label for="img_path">Inserisci un'immagine di copertina</label>
                                <input type="file" class="form-control-file" id="img_path" name="img_path">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group row col-12 ml-0">
                                @foreach ($types as $type)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="type_id[]"
                                               value="{{ $type->id }}"
                                               id="check_{{ $type->id }}" {{ (old('type') == $type->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="check_{{ $type->id }}">
                                            {{ $type->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row buttons">
                            <div class="offset-4 col-2">
                                <a class="btn btn-secondary" href="{{route('home')}}">
                                    <span>Back</span>
                                </a>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection


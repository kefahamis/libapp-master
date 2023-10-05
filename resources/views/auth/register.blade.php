@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card">
                <img src="{{ asset('assets/img/liberator-app.svg') }}" style="width: 60px;" class="mt-4" />

                <div class="card-header text-center">{{ __('Create Account') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-2 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-2  text-md-end">
                                <strong>{{ __('Register as') }}</strong>
                            </div>
                            <div class="col-md-10">
                                <select name="role" class="form-select form-select-md">
                                    <option value="1">Admin</option>
                                    <option value="2">Human Resource</option>
                                    <option value="3">Staff</option>
                                </select>
                            </div>

                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-3">By creating an account, you accept Liberator’s Terms of
                        Service and Privacy Policy</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
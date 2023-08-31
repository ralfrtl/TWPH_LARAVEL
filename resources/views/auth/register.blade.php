@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <h3 class="mt-5 mx-auto">{{ __('Register') }}</h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <h5 class="text-end">
                                        User credential
                                    </h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

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

                            <div class="row mb-3">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="user_level"
                                       class="col-md-4 col-form-label text-md-end">{{ __('User level') }}</label>

                                <div class="col-md-6">
                                    <input id="user_level" type="number"
                                           class="form-control @error('user_level') is-invalid @enderror"
                                           name="user_level" value="{{ old('user_level') }}" min="1" max="6" required
                                           autocomplete="user_level">

                                    @error('user_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <br>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <h5 class="text-end">
                                        Employee information
                                    </h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-end">{{ __('First name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           name="first_name" value="{{ old('first_name') }}" required
                                           autocomplete="first_name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="middle_name"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Middle name') }}</label>

                                <div class="col-md-6">
                                    <input id="middle_name" type="text"
                                           class="form-control @error('middle_name') is-invalid @enderror"
                                           name="middle_name" value="{{ old('middle_name') }}" required
                                           autocomplete="middle_name" autofocus>

                                    @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="last_name"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Last name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name" value="{{ old('last_name') }}" required
                                           autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="birthday"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Birthday') }}</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="date"
                                           class="form-control @error('birthday') is-invalid @enderror"
                                           name="birthday" value="{{ old('birthday') }}" required
                                           autocomplete="birthday">

                                    @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="salary"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Salary') }}</label>

                                <div class="col-md-6">
                                    <input id="salary" type="number"
                                           class="form-control @error('salary') is-invalid @enderror"
                                           name="salary" value="{{ old('salary') }}" min="1" max="1000000" required
                                           autocomplete="salary">

                                    @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0 float-end">
                                <div class="col-md-6">
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
    </div>
@endsection

@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="card fw-750 mx-auto shadow-lg {{ session('message-class') }}">
            <div class="card-body">
                <p class="text-center m-0">
                    {{ session('message') }}
                </p>
            </div>
        </div>
        <br>
    @endif
        <div class="card fw-750 mx-auto blurred-tangerine shadow-lg">
            <div class="card-title text-center">
                <h2 class="my-4">{{ __((empty($id) ? 'Register' : 'Edit employee info')) }}</h2>
            </div>

            <div class="card-body bg-white p-4">
                @if(empty($id))
                    <form method="POST" action="{{ route('user.store') }}">
                @else
                    <form method="POST" action="{{ route('user.update', ['id' => $id]) }}">
                    @method('PUT')
                @endif
                    @csrf
                    <div class="row mt-3 mb-1">
                        <h5 class="col-md-4 text-end">
                            User credential
                        </h5>
                    </div>

                    <div class="row mb-3">
                        <label for="email"
                               class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ $email ?? '' }}" required autocomplete="email">

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
                                   name="user_level" value="{{ $user_level ?? '' }}" min="1" max="6" required
                                   autocomplete="user_level">

                            @error('user_level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <br>

                    <div class="row mt-3 mb-1">
                        <h5 class="col-md-4 text-end">
                            Employee information
                        </h5>
                    </div>

                    <div class="row mb-3">
                        <label for="first_name"
                               class="col-md-4 col-form-label text-md-end">{{ __('First name') }}</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text"
                                   class="form-control @error('first_name') is-invalid @enderror"
                                   name="first_name" value="{{ $first_name ?? '' }}" required
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
                                   name="middle_name" value="{{ $middle_name ?? '' }}" required
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
                                   name="last_name" value="{{ $last_name ?? '' }}" required
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
                            <input id="date_of_birth" type="date"
                                   class="form-control @error('date_of_birth') is-invalid @enderror"
                                   name="date_of_birth" value="{{ $date_of_birth ?? '' }}" required
                                   autocomplete="date_of_birth">

                            @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="salary"
                               class="col-md-4 col-form-label text-md-end">{{ __('Salary ') . env('LOCAL_CURRENCY') }}</label>

                        <div class="col-md-6">
                            <input id="salary" type="number"
                                   class="form-control @error('salary') is-invalid @enderror"
                                   name="salary" value="{{ $salary ?? '' }}" min="1" max="1000000" required
                                   autocomplete="salary">

                            @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 offset-md-4">
                            <button type="submit" class="btn btn-primary float-end rounded-5 my-3">
                                {{ __(empty($id) ? 'Register' : 'Commit changes') }}
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection

@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="card fw-750 mx-auto shadow-lg blurred-green">
            <div class="card-body">
                <p class="text-center m-0">
                    {{ session('message') }}
                </p>
            </div>
        </div>
        <br>
    @endif
    <div class="card fw-750 mx-auto blurred-blue shadow-lg">
        <div class="card-title text-center">
            <h2 class="my-4">{{ __('Contact us') }}</h2>
        </div>

        <div class="card-body bg-white p-4">
            <div class="row mt-3 mb-1">
                <h5 class="col-md-4 text-end">
                    Send us a message
                </h5>
            </div>

            <form method="POST" action="{{ route('about.send') }}">
                @csrf
                <div class="row mb-3">
                    <label for="full_name"
                           class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>
                    <div class="col-md-6">
                        <input id="full_name"
                               class="form-control" name="full_name"
                               value="{{ $full_name ?? '' }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email"
                           class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control" name="email"
                               value="{{ $email ?? '' }}" required autocomplete="email">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="form_message"
                           class="col-md-4 col-form-label text-md-end">{{ __('Message') }}</label>
                    <div class="col-md-6">
                        <textarea id="form_message"
                            class="form-control" name="form_message" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 offset-md-4">
                        <button type="submit" class="btn btn-primary float-end rounded-5 my-3">
                            {{ __('Submit') }}
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

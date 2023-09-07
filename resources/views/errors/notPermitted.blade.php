@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-danger text-center">
            {{ __('You\'re not an Admin!') }}
        </div>
    </div>
@endsection

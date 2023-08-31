@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('content')
    @if(empty($user))
        <div class="card w-50 mx-auto shadow-lg">
            <div class="card-body bg-gradient-warning text-white">
                <p class="text-center m-0">
                    No results found.
                </p>
            </div>
        </div>
    @else
        <div class="card w-50 mx-auto shadow-lg">
            <div class="card-body bg-gradient-success text-white">
                <p class="text-center m-0">
                    Record retrieved.
                </p>
            </div>
        </div>
        <br>
        <div class="w-50 mx-auto">
            <div class="card shadow-lg">
                <div class="card-body bg-white">
                    <h6 class="text-success">
                        ID# <span> {{$user->id}} </span>
                    </h6>
                    <h5>
                        {{$user->last_name}} {{$user->first_name}}, {{$user->middle_name}}
                    </h5>
                    <p class="m-0">
                        Birthday: {{ Carbon::create($user->date_of_birth)->toFormattedDateString() }}
                    </p>
                    <p class="m-0">
                        Age: {{ $user->age }}
                    </p>
                    <p class="m-0">
                        Salary: {{env('LOCAL_CURRENCY')}} {{ number_format($user->salary) }}
                    </p>
                </div>
            </div>
            <br>
            <a class="btn btn-primary rounded-5 float-right float-end" href="/userlist">Back</a>
        </div>
    @endif
@endsection

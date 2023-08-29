@extends('layouts.app')

@section('content')
    @if(empty($user))
        <div class="card w-50 mx-auto">
            <div class="card-body text-white"
                style="
                    background: rgb(255,188,188);
                    background: linear-gradient(142deg, rgba(255,188,188,1) 0%, rgba(130,0,0,1) 79%);">
                <p class="text-center m-0">
                    No results found.
                </p>
            </div>
        </div>
    @else
        <div class="card w-50 mx-auto">
            <div class="card-body text-white"
                 style="
                    background: rgb(22,255,0);
                    background: linear-gradient(142deg, rgba(22,255,0,1) 0%, rgba(8,91,0,1) 50%);">
                <p class="text-center m-0">
                    Record retrieved.
                </p>
            </div>
        </div>
        <br>
        <div class="w-50 mx-auto">
            <div class="card border-2">
                <div class="card-body bg-white">
                    <p>
                        ID# <span> {{$user->id}} </span>
                    </p>
                    <h5>
                        {{$user->last_name}} {{$user->first_name}}, {{$user->middle_name}}
                    </h5>
                    <p class="m-0">
                        Birthday: {{ date('F j, Y', strtotime($user->date_of_birth)) }}
                    </p>
                    <p class="m-0">
                        Age: {{ $user->age }}
                    </p>
                    <p class="m-0">
                        Salary: {{ number_format($user->salary) }}
                    </p>
                </div>
            </div>
            <br>
            <a class="btn btn-primary rounded-5 float-right float-end" href="/userlist">Back</a>
        </div>
    @endif
@endsection

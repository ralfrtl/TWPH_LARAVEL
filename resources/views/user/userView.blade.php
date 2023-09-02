@extends('layouts.app')

@section('content')
    @if(empty($user))
        <div class="card fw-750 mx-auto shadow-lg blurred-red">
            <div class="card-body">
                <p class="text-center m-0">
                    No results found.
                </p>
            </div>
        </div>
    @else
        <div class="card fw-750 mx-auto shadow-lg blurred-green">
            <div class="card-body">
                <p class="text-center m-0">
                    Record retrieved.
                </p>
            </div>
        </div>
        <br>
        <div class="fw-750 mx-auto">
            <div class="card shadow-lg">
                <div class="card-body bg-white p-4">
                    <p class="text-success m-1">
                        ID# <span> {{$user->id}} </span>
                    </p>
                    <h3 class="pt-3 pb-3">
                        {{$user->last_name}} {{$user->first_name}}, {{$user->middle_name}}
                    </h3>
                    <p class="m-1">
                        Email: {{ $user->email }}
                    </p>
                    <p class="m-1">
                        User level: {{ $user->user_level }}
                    </p>
                    <p class="m-1">
                        Birthday: {{ $user->date_of_birth }}
                    </p>
                    <p class="m-1">
                        Age: {{ $user->age }}
                    </p>
                    <p class="m-1">
                        Salary: {{env('LOCAL_CURRENCY')}} {{ number_format($user->salary) }}
                    </p>
                    <p class="m-1 mt-4">
                        Created at: {{ $user->created_at }}
                    </p>
                </div>
            </div>
            <br>
            <a class="btn btn-primary rounded-5 float-right float-end" href="/user">Back</a>
        </div>
    @endif
@endsection

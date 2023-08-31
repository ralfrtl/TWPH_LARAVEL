@extends('layouts.app')

@section('content')
    <div class="card bg-white w-50 mx-auto">
        <div class="card-body shadow-lg">
            <table class="table table-hover bg-warning table-borderless">
                <thead>
                <tr>
                    <th class="bg-success text-white" scope="col">ID</th>
                    <th class="bg-success text-white" scope="col">Full Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr style="cursor: pointer" onclick="window.location='/userview/{{$user->id}}'">
                        <td class="bg-white">{{$user->id}}</td>
                        <td class="bg-white">{{$user->last_name}} {{$user->first_name}}, {{$user->middle_name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

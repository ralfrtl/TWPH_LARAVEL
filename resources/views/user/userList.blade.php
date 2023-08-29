@extends('layouts.app')

@section('content')
        <table class="table w-50 mx-auto table-hover bg-warning">
            <thead>
            <tr style="background: rgb(22,255,0);
background: linear-gradient(142deg, rgba(22,255,0,1) 0%, rgba(8,91,0,1) 50%);">
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr style="cursor: pointer" onclick="window.location='/userview/{{$user->id}}'">
                    <td>{{$user->id}}</td>
                    <td>{{$user->last_name}} {{$user->first_name}}, {{$user->middle_name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    <div class="bg-white ">
    </div>
@endsection

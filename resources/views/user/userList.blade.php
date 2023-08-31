@extends('layouts.app')

@section('content')
    <div class="card bg-white w-50 mx-auto">
        <div class="card-body shadow-lg">
            <table class="table table-hover bg-warning table-borderless">
                <thead class="bg-gradient-success" style="background-attachment: fixed">
                <tr style="background-color: transparent">
                    <th class="text-white" style="background-color: transparent" scope="col">ID</th>
                    <th class="text-white" style="background-color: transparent" scope="col">Full Name</th>
                    <th class="text-white" style="background-color: transparent" scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="bg-white" style="cursor: pointer" onclick="window.location='{{ route('user.show', ['id' => $user->id]) }}'">
                        <td class="col-1">{{$user->id}}</td>
                        <td class="col-7">{{$user->last_name}} {{$user->first_name}}, {{$user->middle_name}}</td>
                        <td class="col-2">
                            <div class="float-end">
                                <a class="btn btn-sm btn-outline-primary rounded-5" href="{{ route('user.edit', ['id' => $user->id]) }}">
                                    Edit
                                </a>
                                <a class="btn btn-sm btn-outline-danger rounded-5" href="user/delete">
                                    Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

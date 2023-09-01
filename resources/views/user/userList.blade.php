@extends('layouts.app')

@section('content')
@if(session('message'))
    <div class="card fw-750 mx-auto shadow-lg">
        <div class="card-body {{ session('message-class') }} text-white">
            <p class="text-center m-0">
                {{ session('message') }}
            </p>
        </div>
    </div>
    <br>
@endif
    <div class="card bg-white fw-750 mx-auto shadow-lg">
        <div class="card-body m-0 p-0">
            <table class="table table-hover table-borderless m-0">
                <thead class="bg-gradient-neutral" style="background-attachment: fixed">
                <tr style="background-color: transparent">
                    <th class="text-white text-center py-3 h3" style="background-color: transparent" scope="col">ID</th>
                    <th class="text-white py-3 h3" style="background-color: transparent" scope="col">Full Name</th>
                    <th class="text-white" style="background-color: transparent" scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="py-3" style="cursor: pointer" onclick="window.location='{{ route('user.show', ['id' => $user->id]) }}'">
                        <td class="col-2 align-middle text-center px-4">
                                {{$user->id}}
                        </td>
                        <td class="col-8 align-middle">
                                {{$user->last_name}} {{$user->first_name}}, {{$user->middle_name}}
                        </td>
                        <td class="col-2 align-middle">
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary rounded-5" href="{{ route('user.edit', ['id' => $user->id]) }}">
                                    Edit
                                </a>
                                <a class="btn btn-sm btn-outline-danger rounded-5" href="{{ route('user.destroy', ['id' => $user->id]) }}">
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

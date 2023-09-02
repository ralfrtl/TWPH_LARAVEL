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
        <div class="card-body m-0 p-0  blurred-blue">
            <table class="table table-hover table-borderless m-0">
                <thead>
                <tr>
                    <th class="text-center py-3 h3" style="background-color: rgba(0,0,0,.05); border-top-left-radius: 6px;" scope="col">ID</th>
                    <th class="py-3 h3" style="background-color: rgba(0,0,0,.05)" scope="col">Full Name</th>
                    <th class="text-center align-middle" style="background-color: rgba(0,0,0,.05); border-top-right-radius: 6px;" scope="col">
                        <a class="btn btn btn-success rounded-5" href="{{ route('user.create') }}">
                            <i class="bi bi-person-plus"></i>
                            Add user account
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="py-3" style="cursor: pointer" onclick="window.location='{{ route('user.show', ['id' => $user->id]) }}'">
                        <td class="col-2 align-middle text-center px-4">
                                {{$user->id}}
                        </td>
                        <td class="col-7 align-middle">
                                {{$user->last_name}} {{$user->first_name}}, {{$user->middle_name}}
                        </td>
                        <td class="col-3 text-center align-middle">
                            <a class="btn btn-sm btn-outline-primary rounded-5" href="{{ route('user.edit', ['id' => $user->id]) }}">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>
                            <a class="btn btn-sm btn-outline-danger rounded-5" href="{{ route('user.destroy', ['id' => $user->id]) }}"
                                onclick="showConfirmDialog(event)">
                                <i class="bi bi-person-dash"></i>
                                Delete
                            </a>
                            <script>
                                function showConfirmDialog(e){
                                    e.stopPropagation()
                                    return confirm('You sure you want to delete this')
                                }
                            </script>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


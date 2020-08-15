@extends('layouts.layout') 
@section('content')
<h1>Facecookies</h1>
<a class="btn btn-success" href="{{ route('usuarios.create')}}">Create</a>
@empty ($users)
    <div class="alert alert-warning">
        The list of usuarios is empty
    </div>
@else
<div class="table-responsive">
    <table class="table table-striped" >
        <thead class="thrad-light">
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Genero</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id}}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->last_name}}</td>
                <td>{{ $user->years}}</td>
                <td>{{ $user->gender}}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->status}}</td>
                <td>{{ $user->admin}}</td>
                <td>
                    {{--
                    <a class="btn btn-link" 
                        href="{{ route('GestionUsers.show',['user' => $user->id])}}">
                        Show</a>

                        <a class="btn btn-link" 
                        href="{{ route('GestionUsers.edit', ['user' => $user->id ])}}">
                        Edit</a>

                        <form method="POST" class="d-inline" action="{{ route('GestionUsers.destroy', ['user' => $user->id ])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link">Delete</button>
                        </form>
                        --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endempty
@endsection
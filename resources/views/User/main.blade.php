@extends('layouts.layout') 
@section('content')
<font size=32 style="color:#132735" face="Segoe UI">
<h1 align="center">Facecookies</h1>
</font>
<h1> <form class="form-inline " >
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>
    
</h1>

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
                        <a class="btn btn-primary" 
                        href="{{ route('usuarios.edit',$user->id)}}">Edit</a>
                        <form method="POST" class="d-inline" action="{{ route('usuarios.destroy',$user->id )}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endempty
@endsection
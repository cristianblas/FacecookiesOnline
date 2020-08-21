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

<div class="table-responsive">
    <table class="table table-striped" >
      <thead class="thrad-light">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Genero</th>
        </tr>
    </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name}}</td>
                <td>{{ $user->last_name}}</td>
                <td>{{ $user->years}}</td>
                <td>{{ $user->gender}}</td>
                <td>
                    <a class="btn btn-success" 
                    href="{{ route('solicitudes.store',$user->id)}}">Enviar Solicitud</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection




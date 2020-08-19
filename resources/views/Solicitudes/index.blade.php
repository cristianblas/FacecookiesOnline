@extends('layouts.layout') 
@section('content')
<font size=32 style="color:#132735" face="Segoe UI">
<h1 align="center">Facecookies</h1>
</font>

@empty($solicitudes)
    <div class="alert alert-primary">
        Tu Lista de solicitudes esta vacia...!
    </div>
@else
<div class="table-responsive">
    <div class="alert alert-primary">
        Tus Solicitudes de Amistad
    </div>
    <table class="table table-striped" >
        <tbody>
            @foreach ($solicitudes as $friend)
            <tr>
                <td>{{ $friend->name}}</td>
                <td>{{ $friend->last_name}}</td>
                <td>{{ $friend->years}}</td>
                <td>{{ $friend->gender}}</td>
                
                <td>
                        <a class="btn btn-success" 
                        href="{{ route('solicitudes.edit',$friend->id)}}">Aceptar</a>
                        <a class="btn btn-danger" 
                        href="{{ route('solicitudes.destroy',$friend->id)}}">Rechazar</a>
                       {{-- <form method="POST" class="d-inline" action="{{ route('solicitudes.destroy',$friend->id )}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Rechazar</button>
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
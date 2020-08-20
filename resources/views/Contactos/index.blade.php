@extends('layouts.layout') 
@section('content')
<font size=32 style="color:#132735" face="Segoe UI">
<h1 align="center">Facecookies</h1>
</font>

@empty($contactos)
    <div class="alert alert-primary">
        Tu Lista de contactos esta vacia...!
    </div>
@else
<div class="table-responsive">
    <div class="alert alert-primary">
        Tu Lista de Contactos
    </div>
    <table class="table table-striped" >
        <tbody>
            @foreach ($contactos as $contact)
            <tr>
                <td>{{ $contact->name}}</td>
                <td>{{ $contact->last_name}}</td>
                <td>{{ $contact->email}}</td>
                <td>{{ $contact->telephone}}</td>
                <td>{{ $contact->years}}</td>
                <td>{{ $contact->gender}}</td>
                <td> 
                        <a class="btn btn-danger" 
                        href="{{ route('contactos.edit',$contact->id)}}">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endempty
@endsection
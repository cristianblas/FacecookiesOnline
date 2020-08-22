@extends('layouts.layout') 
@section('content')
<font size=32 style="color:#132735" face="Segoe UI">
<h1 align="center">Facecookies Notificaciones</h1>
</font>

<div class="table-responsive">
    <table class="table table-striped" >
        <tbody>
            @foreach ($notificaciones as $noti)
            <tr>
                <td> 
                    <div class="alert alert-primary col-md-4">
                    <strong>{{$noti->content}}</strong> {{$noti->type}} <a href="{{route('notificaciones.destroy',$noti->id)}}" 
                        class="alert-link">Marcar como leido</a>.
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
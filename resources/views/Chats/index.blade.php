@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="alert alert-primary">
            Tu Lista de Chats
        </div>
        <div class="row">
            @csrf
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach($users as $user)
                            <li class="user" id="{{ $user->id }}">
                                {{--will show unread count notification --}}
                                
                                <div class="media">
                                    <div class="media-left">
                                       <img src="{{asset('dist/img/usuarioLogo.PNG')}}" alt="" class="media-object"> 
                                    </div>
                                    <div class="media-body">
                                        <p class="name">{{ $user->name }}</p>
                                        <p class="email">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
                
                <div class="col-md-8" id="messages">
                    
                </div>
        </div>
    </div>
@endsection
@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="alert alert-primary">
            Tu Lista de Chats
        </div>
        <h1> <form class="form-inline " >
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" name="search" type="search" placeholder="Buscar chat" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </h1>
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
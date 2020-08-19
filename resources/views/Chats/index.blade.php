@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach($users as $user)
                            <li class="user" id="{{ $user->id }}">
                                {{--will show unread count notification--}}
                                @if($user->id)
                                    <span class="pending">{{--{{ $user->unread }} --}}</span>
                                @endif  
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
                <div class="message-wrapper">
                    <ul class="messages">
                     {{--  @foreach($messages as $message)
                            <li class="message clearfix">
                                <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                                    <p>{{ $message->message }}</p>
                                    <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                                </div>
                            </li>
                        @endforeach
                    --}} 
                    <li class="message clearfix">
                       
                    </li>
                    </ul>
                </div>
                
                <div class="input-text">
                    <input type="text" name="message" class="submit">
                </div>
            </div>
        </div>
    </div>
@endsection
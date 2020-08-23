@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="alert alert-primary">
            Tu Lista de Chats
        </div>
        <h1> 
        <form class="form-inline" >
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
                                        <p class="name">El {{ $user->name }}</p>
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


@section('script')

<script>
  var receiver_id = '';
  var lastData = ""
  var my_id = "{{ Auth::id() }}"; 
  $(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('.user').click(function() {
          $('.user').removeClass('active');
          $(this).addClass('active');
          $(this).find('.pending').remove();
          receiver_id = $(this).attr('id');
          $.ajax({
              type: "get",
              url: "message/" + receiver_id, // need to create this route
              data: "",
              cache: false,
              success: function(data) {
                  lastData = data;
                  $('#messages').html(data);
                  scrollToBottomFunc();
              }
          });
      });
      setInterval(() => {
          if (receiver_id !== "") {
              console.log("puedo recuperar");
              $.ajax({
                  type: "get",
                  url: "message/" + receiver_id, // need to create this route
                  data: "",
                  cache: false,
                  success: function(data) {
                      if (data !== lastData) {
                          lastData = data;
                          $('#messages').html(data);
                          scrollToBottomFunc();
                      }
                  }
              });
          }
      }, 2000);
      $(document).on('keyup', '.input-text input', function(e) {
          var message = $(this).val();
          // check if enter key is pressed and message is not null also receiver is selected
          if (e.keyCode == 13 && message != '' && receiver_id != '') {
              $(this).val(''); // while pressed enter text box will be empty
              var datastr = "receiver_id=" + receiver_id + "&message=" + message;
              $.ajax({
                  type: "get",
                  url: "/message", // need to create this post route
                  data: datastr,
                  cache: false,
                  success: function(data) {
                      $.ajax({
                          type: "get",
                          url: "message/" + receiver_id, // need to create this route
                          data: "",
                          cache: false,
                          success: function(data) {
                              if (data !== lastData) {
                                  lastData = data;
                                  $('#messages').html(data);
                                  scrollToBottomFunc();
                              }
                          }
                      });
                  },
                  complete: function() {
                      scrollToBottomFunc();
                  }
              })
          }
      });
  });
  function scrollToBottomFunc() {
      $('.message-wrapper').animate({
          scrollTop: $('.message-wrapper').get(0).scrollHeight
      }, 50);
  }
  // make a function to scroll down auto
</script>
@endsection

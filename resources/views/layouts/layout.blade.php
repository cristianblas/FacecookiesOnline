<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>Facecookies | Inicio</title>
  <!-- SWITCHERY -->
  <link href="{{ asset('assets/plugins/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
  <!-- Bootstrap Core CSS -->
  <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    /* width */
    ::-webkit-scrollbar {
        width: 7px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #a7a7a7;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #929292;
    }

    ul {
        margin: 0;
        padding: 0;
    }

    li {
        list-style: none;
    }

    .user-wrapper, .message-wrapper {
        border: 1px solid #dddddd;
        overflow-y: auto;
    }

    .user-wrapper {
        height: 500px;
    }

    .user {
        cursor: pointer;
        padding: 5px 0;
        position: relative;
    }

    .user:hover {
        background: #eeeeee;
    }

    .user:last-child {
        margin-bottom: 0;
    }

    .pending {
        position: absolute;
        left: 10px;
        top: 9px;
        background: #66aa26;
        margin: 0;
        border-radius: 50%;
        width: 9px;
        height: 9px;
        line-height: 18px;
        padding-left: 5px;
        color: #ffffff;
        font-size: 12px;
    }

    .media-left {
        margin: 0 10px;
    }

    .media-left img {
        width: 64px;
        border-radius: 64px;
    }

    .media-body p {
        margin: 6px 0;
    }

    .message-wrapper {
        padding: 10px;
        height: 430px;
        background: #eeeeee;
    }

    .messages .message {
        margin-bottom: 15px;
    }

    .messages .message:last-child {
        margin-bottom: 0;
    }

    .received, .sent {
        width: 45%;
        padding: 3px 10px;
        border-radius: 10px;
    }

    .received {
        background: #ffffff;
    }

    .sent {
        background: #3bebff;
        float: right;
        text-align: right;
    }

    .message p {
        margin: 5px 0;
    }

    .date {
        color: #777777;
        font-size: 12px;
    }

    .active {
        background: #eeeeee;
    }

    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 15px 0 0 0;
        display: inline-block;
        border-radius: 4px;
        box-sizing: border-box;
        outline: none;
        border: 1px solid #cccccc;
    }

    input[type=text]:focus {
        border: 1px solid #aaaaaa;
    }
  </style>

</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-purple navbar-light" >
    <!-- Left navbar links -->  
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    <!-- SEARCH FORM FOR ADMIN -->
    <!-- Right navbar links -->
    
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fa fa-cog fa-spin fa-1x fa-fw"></i></a>
      </li>
      <!-- LOG OUT -->
      @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        
      @endguest
    </ul>
   <!-- </ul> -->
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Sidebar -->
    <div class="sidebar " >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/usuario.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="/home" class="d-block" style="color:#9dbdd3" > {{Auth::user()->name}}</a>
        </div>
      </div>
      @if (Auth::user()->admin==true) 
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <p class="nav-icon fa fa-fw fa-home" style="color:#9dbdd3">  Admin of Facecookies</p>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('usuarios.index') }}" aria-expanded="false">
                    <i class="nav-icon fa fa-fw fa-user"></i>
                    <p>  
                    Gestionar Usuarios
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th" aria-hidden="true"></i>
                  <p>
                    Visualizar Reportes
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Visualizar Estadisticas
                  </p>
                </a>
            </li>
        </ul>
      </nav>
      @else
      <!-- Usuario -->
      <nav class="mt-8">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!--<p class="nav-icon fa fa-fw fa-home" style="color:#9dbdd3"></p> -->
            <li class="nav-item">
               <a class="nav-link" href="{{ route('contactos.index') }}" aria-expanded="false"> 
                    <i class="nav-icon fa fa-address-book" ></i>
                    <p>
                      Gestion de Contactos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="{{ route('busquedas.index') }}" aria-expanded="false"> 
                  <i class="fas fa-search" ></i>
                  <p>
                      Buscador de Amigos
                  </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('solicitudes.index') }}" aria-expanded="false"> 
                  <i class="fa fa-user-plus" ></i>
                  <p>
                      Solicitudes de amistades
                  </p>
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('chats.index') }}" aria-expanded="false"> 
                <i class="fa fa-envelope-open" ></i>
                <p>
                    Mensajes
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('notificaciones.index') }}" aria-expanded="false"> 
                <span class="badge badge-success navbar-badge">1</span> 
                <i class="fa fa-bell" ></i>
                <p>
                    Notificaciones
                </p>
              </a>
            </li>
        </ul>
      </nav>
      @endif
      <!-- /.sidebar-menu -->
    </div>
    
    <!-- /.sidebar -->
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div><!-- /.container-fluid -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <div class="slimscrollright">
        <div class="rpanel-title"> Panel de personalización <span><i class="ti-close right-side-toggle"></i></span>
        </div>
        <div class="r-panel-body">
            <ul id="themecolors" class="m-t-20">
                <li class="d-block m-t-30"><b>Estilos</b></li>
                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a>
                </li>
                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a>
                </li>
                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
            </ul>
            
            <label class="d-block m-t-30"> Tamaño de letra </label>
            <input name="font-size" id="font-size" value="{{Auth::user()->fontSize}}" type="number" step="0.2" />
        </div>
    </div>
      <h5>Configuration</h5>
      <p>Font</p>
      <p>Style</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    © 2020 Universidad Autónoma Gabriel René Moreno - Tecnología Web
    <div style="float: right">
      <!-- Contador de visitas -->
    <center><a href="http://www.websmultimedia.com/contador-de-visitas-gratis" title="Contador De Visitas Gratis">
     <img style="border: 0px solid; display: inline;" alt="contador de visitas" src="http://www.websmultimedia.com/contador-de-visitas.php?id=282866"></a><br><a href='http://www.websmultimedia.com/contador-de-visitas-gratis'>Visitas Facecookies</a><br></center>
      <!-- Fin Contador de visitas -->
    </div>
  </footer>
</div>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@yield('script')

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- All Jquery -->
<!-- ============================================================== -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

</body>
</html>
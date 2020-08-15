@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" >
                <div class="card-header "><h1>Facecookies</h1></div>

                <div class="card-body">
                    
                    <!-- formulario envio de datos -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                           <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electronico">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                         <!--   <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{--
    <section class="login-form-wrap">
                    <h1>Facecookies</h1>
                    <form class="login-form" action="POST" action="#">
                      <label>
                        <input type="email" name="email" required placeholder="Correo Electronico">
                      </label>
                      <label>
                        <input type="password" name="password" required placeholder="Contraseña">
                      </label>
                      <input type="submit" value="Ingresar">
                      <input type="submit" value="Registrarse">
                    </form>
                    <h5><a href="#">Olvido Su Contraseña?</a>
                    <div class="links">
                        <h5>
                        <a href="{{ url('/') }}">Acerca de Nosotros   </a>
                        <a href="{{ url('/') }}">Contactanos    </a>
                        <a href="{{ url('/') }}">Grupo 14   </a>
                    </h5>
                    </div>
                </h5>
                  </section>
    
    --}}
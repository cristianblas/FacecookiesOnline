@extends('layouts.layout')
@section('content')
    <h1>Editando Perfil</h1>
    
    <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-4">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ??$user -> name }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

            <div class="col-md-4">
                <input id="last_name type="las_name" class="form-control" @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ??$user -> last_name }}" required autocomplete="last_name">
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-4">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ??$user -> email }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="years" class="col-md-4 col-form-label text-md-right">{{ __('Years') }}</label>

            <div class="col-md-4">
                <input id="years" type="text" class="form-control @error('years') is-invalid @enderror" name="years" value="{{ old('years')??$user -> years }}" required autocomplete="years" autofocus>

                @error('years')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        
        <div class="form-group row">
            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

            <div class="col-md-4">
                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone')??$user -> telephone  }}" required autocomplete="telephone" autofocus>

                @error('telephone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
            <div class="col-md-4">
                <select class="custom-select" name="gender" required>
                <option value="selected">Select...</option>
                <option {{ old('status') == 'masculino' ? 'selected':($user ->gender == 'masculino' ? 'selected' : '')  }} value="masculino">Masculino</option>
                <option {{ old('status') == 'femenino' ? 'selected' :($user ->gender == 'femenino' ? 'selected' : '')  }} value="femenino" >Femenino</option>
                </select>
                @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>  
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
            </div>
        </div> 
    </form>
    
@endsection
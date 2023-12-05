@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('ABICI DOMICILIOS Y MENSAJERIA')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Register') }}</strong></h4>
            <div class="social-line">
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
          <div class="card-body ">
            <p class="card-description text-center">{{ __('Or Be Classical') }}</p>
            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
              </div>
              @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                  <strong>{{ $errors->first('name') }}</strong>
                </div>
              @endif
            </div>
             <!-- Apellido -->
             <div class="bmd-form-group{{ $errors->has('apellidos') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" name="apellidos" class="form-control" placeholder="{{ __('Apellido...') }}" value="{{ old('apellidos') }}" required autocomplete="apellidos">
                </div>
                @if ($errors->has('apellidos'))
                  <div id="apellidos-error" class="error text-danger pl-3" for="apellidos" style="display: block;">
                    <strong>{{ $errors->first('apellidos') }}</strong>
                  </div>
                @endif
              </div>    
              <!-- Tipo de Documento -->
            <div class="bmd-form-group{{ $errors->has('TipoDocumento') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">assignment_ind</i>
                    </span>
                  </div>
                  <select name="TipoDocumento" class="form-control" required>
                    <option value="CC">{{ __('Cedula de Ciudadania') }}</option>
                    <option value="TI">{{ __('Targeta de Identidad') }}</option>
                    <!-- Agrega otras opciones según sea necesario -->
                  </select>
                </div>
                @if ($errors->has('TipoDocumento'))
                  <div id="TipoDocumento-error" class="error text-danger pl-3" for="TipoDocumento" style="display: block;">
                    <strong>{{ $errors->first('TipoDocumento') }}</strong>
                  </div>
                @endif
              </div>
               <!-- Numero de Documento -->
            <div class="bmd-form-group{{ $errors->has('NumDocumento') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">format_list_numbered</i>
                    </span>
                  </div>
                  <input type="text" id="NumDocumento" name="NumDocumento" class="form-control" placeholder="{{ __('Numero de Documento...') }}" value="{{ old('NumDocumento') }}" required>
                </div>
                @if ($errors->has('NumDocumento'))
                  <div id="NumDocumento-error" class="error text-danger pl-3" for="numDocumento" style="display: block;">
                    <strong>{{ $errors->first('NumDocumento') }}</strong>
                  </div>
                @endif
              </div>
               <!-- Fecha de Nacimiento -->
            <div class="bmd-form-group{{ $errors->has('FechaNacimiento') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">date_range</i>
                    </span>
                  </div>
                  <input type="date" name="FechaNacimiento" class="form-control" placeholder="{{ __('Fecha de Nacimiento...') }}" value="{{ old('FechaNacimiento') }}" required>
                </div>
                @if ($errors->has('FechaNacimiento'))
                  <div id="FechaNacimiento-error" class="error text-danger pl-3" for="FechaNacimiento" style="display: block;">
                    <strong>{{ $errors->first('FechaNacimiento') }}</strong>
                  </div>
                @endif
              </div>
              <!-- Telefono -->
            <div class="bmd-form-group{{ $errors->has('Telefono') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">phone</i>
                    </span>
                  </div>
                  <input type="text" name="Telefono" class="form-control" placeholder="{{ __('Telefono...') }}" value="{{ old('Telefono') }}" required>
                </div>
                @if ($errors->has('Telefono'))
                  <div id="Telefono-error" class="error text-danger pl-3" for="Telefono" style="display: block;">
                    <strong>{{ $errors->first('Telefono') }}</strong>
                  </div>
                @endif
              </div>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required autocomplete="username">
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <!-- Direccion -->
            <div class="bmd-form-group{{ $errors->has('Direccion') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">location_on</i>
                    </span>
                  </div>
                  <input type="text" name="Direccion" class="form-control" placeholder="{{ __('Direccion...') }}" value="{{ old('Direccion') }}" required>
                </div>
                @if ($errors->has('Direccion'))
                  <div id="Direccion-error" class="error text-danger pl-3" for="Direccion" style="display: block;">
                    <strong>{{ $errors->first('Direccion') }}</strong>
                  </div>
                @endif
              </div>
                  <!-- rol -->
              <div class="input-group">
                <input type="text" name="rol" class="form-control" value="Usuario" required hidden>
              </div>
              @if ($errors->has('rol'))
                <div id="rol-error" class="error text-danger pl-3" for="rol" style="display: block;">
                  <strong>{{ $errors->first('rol') }}</strong>
                </div>
              @endif
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required autocomplete="new-password">
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required autocomplete="new-password">
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Create account') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

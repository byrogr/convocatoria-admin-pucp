@extends('template.acceso')

@section('title', 'Acceso')

@section('css_inline')
<style>
    
    .img-logo {
        height: 91px;
        margin-top: 25%;
        width: 367px;
    }

    .login-panel-custom {
        margin-top: 5%;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="img-logo">
            <img class="img-responsive" src="{{ asset('assets/dist/img/convocatoria_titulo.png') }}">
        </div><!-- end of img-logo -->
        <div class="login-panel panel panel-default login-panel-custom">
            <div class="panel-heading">
                <h3 class="panel-title">Por favor ingrese sus datos</h3>
            </div><!-- end of .panel-heading -->
            <div class="panel-body">
				
				@if(count($errors) > 0)
					<div class="alert alert-danger">
						@foreach ($errors->all() as $e)
							<p>{{ $e }}</p>
						@endforeach
						
					</div><!-- end of .alert -->
				@endif

                <form id="#frmLogin" role="form" action="{{ route('login') }}" method="post">
                	{!! csrf_field() !!}
                    <fieldset>
                        <div class="form-group input-group">
                        	<span class="input-group-addon">
                        		<i class="fa fa-envelope"></i>
                        	</span>
                            <input class="form-control" placeholder="Correo Electr&oacute;nico" name="email" type="email" autofocus value="{{ old('email') }}">
                        </div>
                        <div class="form-group input-group">
                        	<span class="input-group-addon">
                        		<i class="fa fa-asterisk"></i>
                        	</span>
                            <input class="form-control" placeholder="Contrase&ntilde;a" name="password" type="password" value="">
                        </div>
                        <!-- <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Recu&eacute;rdame
                            </label>
                        </div> -->
                        <!-- Change this to a button or input when using this as a form -->
                        <button type="submit" class="btn btn-lg btn-success btn-block">
                        	Acceder <i class="fa fa-sign-in"></i>
                        </button>
                    </fieldset>
                </form><!-- end of #frmLogin -->
            </div><!-- end of .panel-body -->
        </div><!-- end of .login-panel -->
    </div><!-- end of .col-md-4 -->
</div><!-- end of .row -->
@endsection
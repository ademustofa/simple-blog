@extends('layout.master')

@section('title', '| Login')

@section('konten')


	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<div class="login-box">
			<div class="text-login">
				<p>LOGIN USER</p>
			</div>

			{!! Form::open() !!}

		   <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		   		{{ Form::label('email', 'Email:', ['style' => 'margin-left: 15px;']) }}
			    {{ Form::text('email', null, ['class' => 'form-control input-lg login-input', 'placeholder' => 'Enter Email']) }}
			    @if ($errors->has('email'))
	                <span class="help-block">
	                     <strong>{{ $errors->first('email') }}</strong>
	                </span>
	            @endif
		   </div>
		    
		    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				{{ Form::label('password', 'Password:', ['style' => 'margin-left: 15px;']) }}
			    {{ Form::password('password',  ['class' => 'form-control input-lg login-input', 'placeholder' => 'Enter Password']) }}
			    @if ($errors->has('password'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('password') }}</strong>
	                </span>
	          	@endif
          	</div>
			<br>

		    {{ Form::submit('Login', ['class' => 'btn btn-default btn-block btn-lg btn-blue']) }}
		    <br>

		    <p><a href="{{ url('password/reset') }}">Forgot Password?</a></p>

		{!! Form::close() !!}
		</div>
		<br>
		
		
	</div>
	</div>

@stop
@extends('layout.master')

@section('title', '| Register')

@section('konten')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="login-box">
				<div class="text-login">
					<p>REGISTER USER</p>
				</div>

					{!! Form::open() !!}
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							{{ Form::label('name', 'Name:') }}
						    {{ Form::text('name', null, ['class' => 'form-control input-lg login-input', 'placeholder' => 'Enter Name']) }}
						    @if ($errors->has('name'))
				                <span class="help-block">
				                     <strong>{{ $errors->first('name') }}</strong>
				                </span>
				            @endif
					    </div>

						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						    {{ Form::label('email', 'Email:') }}
						    {{ Form::text('email', null, ['class' => 'form-control input-lg login-input', 'placeholder' => 'Enter Email']) }}
						    @if ($errors->has('email'))
				                <span class="help-block">
				                     <strong>{{ $errors->first('email') }}</strong>
				                </span>
				            @endif
					    </div>
						<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
							{{ Form::label('password', 'Password:') }}
						    {{ Form::password('password',  ['class' => 'form-control input-lg login-input', 'placeholder' => 'Enter Password']) }}	
						    @if ($errors->has('password'))
				                <span class="help-block">
				                     <strong>{{ $errors->first('password') }}</strong>
				                </span>
				            @endif
						</div>
						<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
							{{ Form::label('password_confirmation', 'Password Confirmation:') }}
						    {{ Form::password('password_confirmation',  ['class' => 'form-control input-lg login-input', 'placeholder' => 'Enter Confirm Password']) }}
						    @if ($errors->has('password_confirmation'))
				                <span class="help-block">
				                     <strong>{{ $errors->first('password_confirmation') }}</strong>
				                </span>
				            @endif
					    </div>
						<br>

					    {{ Form::submit('Register', ['class' => 'btn btn-default btn-block btn-lg btn-blue']) }}

					{!! Form::close() !!}
			</div>
		</div>
	</div>

@stop
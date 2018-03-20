@extends('layout.master')

@section('title', '| Reset my Password')

@section('konten')


	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					{!! Form::open(['url' => 'password/reset', 'method' => "POST"]) !!}

					{{ Form::hidden('token', $token) }}

					{{ Form::label('email', 'Email Address:') }}
					{{ Form::email('email', $email, ['class' => 'form-control']) }}
					<br>

					{{ Form::label('password', 'New Password:') }}
					{{ Form::password('password', ['class' => 'form-control']) }}
					<br>

					{{ Form::label('password_confirmation', 'Confirm New Password:') }}
					{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
					<br>

					{{ Form::submit('Reset Password', ['class' => 'btn btn-default btn-block btn-blue']) }}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@stop
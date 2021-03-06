@extends('layout.master')

@section('title', '| Forgot my Password')

@section('konten')

	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">

					@if(session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					{!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}

					{{ Form::label('email', 'Email Address:') }}
					{{ Form::email('email', null, ['class' => 'form-control']) }}
					<br>

					{{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-block btn-email']) }}

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@stop
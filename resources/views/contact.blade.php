
@extends('layout.master')

@section('title', '| Contact')

@section('konten')
	
	<div class="row">
		<div class="col-md-6">
			<h1>Contact Me</h1>
			<hr>
			<form action="{{ url('contact') }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" id="email" class="form-control">
				</div>
				<div class="form-group">
					<label for="subject">Subject:</label>
					<input type="text" class="form-control" name="subject" id="subject">
				</div>
				<div class="form-group">
					<label for="message">Message:</label>
					<textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Send Message">
				</div>
			</form>
		</div>
	</div>

@stop  
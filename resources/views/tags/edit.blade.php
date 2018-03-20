@extends('layout.master')

@section('title', "| Edit Tag")

@section('konten')
<div class="konten">
	{{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => "PUT"]) }}
		{{ Form::label('name', "Title:") }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}
		<br>

		{{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
	{{ Form::close() }}
</div>
@stop

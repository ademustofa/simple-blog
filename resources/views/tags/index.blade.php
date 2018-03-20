@extends('layout.master')

@section('title', '| All Tags')

@section('konten')
<div class="konten">
	<div class="row">
		<div class="col-md-8">
			<h1>Categories</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tags as $tag)
					<tr>
						<td>{{ $tag->id }}</td>
						<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

					<h2>New Tags</h2>

				    {{ Form::label('name', 'Name:') }}
				    {{ Form::text('name', null, ['class' => 'form-control']) }}
				    <br>

				    <!-- {{ Form::submit('Create New Tags', ['class' => 'btn btn-default btn-block btn-blue']) }} -->
				    <button type="submit" class="btn btn-default btn-block btn-blue"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Create New Tags</button>


				{!! Form::close() !!}
			</div>
		</div>
	</div>
	
</div>
@stop  


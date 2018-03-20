@extends('layout.master')

@section('title', "| $tag->name Tag")

@section('konten')
<div class="konten">
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-default btn-block btn-green pull-right" style="margin-top: 20px;"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit</a>
		</div>
		<div class="col-md-2">
			{{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
				<button type="submit" class="btn btn-default btn-block btn-red" style="margin-top: 20px;"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Delete</button>
			{{ Form::close() }}
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($tag->posts as $post)
						
						<tr>
							<td>{{ $post->id }}</td>
							<td>{{ $post->title }}</td>
							<td>
								@foreach($post->tags as $tag)
									
									<span class="label label-default">{{ $tag->name }}</span>

								@endforeach
							</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View</a></td>
						</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop

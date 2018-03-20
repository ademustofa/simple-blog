@extends('layout.master')

@section('title', '| View Post')

@section('konten')

<div class="konten">
	<div class="row">

		<div class="col-md-8">
			<img src="{{ asset('images/'. $post->image) }}" alt="">
			<br>
			<h1><strong>{{ $post->title }}</strong></h1>
			<p class="lead">{!! $post->body !!}</p>

			<hr>

			<div class="tags">
				@foreach($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>
		</div>
		

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Categories:</label>
					<p>{{ $post->category->name }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Create At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>last Update:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>
				<hr>
				<!-- <div class="row">
					<div class="col-md-6">
						
					</div>
					<div class="col-md-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
											
											
						{!! Form::close() !!}
					</div>
				</div> -->
				<br>
				<div class="row">
					<div class="col-md-12">
						{!! Html::linkRoute('posts.index', '<< See All Post', array(), ['class' => 'btn btn-default btn-block btn-basic']) !!}
					</div>
				</div>

			</div>
		</div>

	</div>
	
</div>
@stop


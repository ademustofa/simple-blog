@extends('layout.master')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('konten')
<div class="konten">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<img src="{{ asset('images/'. $post->image) }}" alt="">
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body !!}</p>
			<br>
			<p>Posted In: {{ $post->category->name }}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-nfo">
						<img src="" alt="" class="author-image">
						<div class="author-name">
							<h3> {{ $comment->name }}</h3>
							<p class="author-time"> 
								{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}
							</p>
						</div>
					</div>	
					<div class="comment-content">
						<p>{{ $comment->comment }}</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2">
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

			<div class="row">
				<div class="col-md-6">
					{{ Form::label('name', "Name:") }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
				</div>
				<div class="col-md-6">
					{{ Form::label('email', "Email:") }}
					{{ Form::text('email', null, ['class' => 'form-control']) }}
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					{{ Form::label('comment', "Comment:") }}
					{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
					<br>

					{{ Form::submit('Add Comment', ['class' => 'btn btn-default btn-block btn-green-default']) }}
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop
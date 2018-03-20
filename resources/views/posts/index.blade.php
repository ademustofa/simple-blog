@extends('layout.master')

@section('title', '| All Post')

@section('konten')
<div class="konten">	
	<div class="row">
		<div class="text-center">
			<h2>All Posts</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3 col-md-offset-9">
			<h1><a href="{{ route('posts.create') }}" class="btn btn-default btn-block btn-blue"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Create New Post</a></h1>
		</div>
	</div>

	<div class="get-post">
		<div class="row">
			<div class="col-md-8 col-md-offset-1">
				@foreach ($posts as $post)
					<h3><strong>{{ $post->title }}</strong></h3>
					<p class="created-at"><span class="glyphicon glyphicon-calendar"></span>&nbsp;{{ date('M j, Y', strtotime($post->created_at)) }}</p>
					<p class="body">{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
					<div class="option">
						<a href="{{  route('posts.show', $post->id) }}" class="btn btn-default btn-basic-default"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;View</a>

						<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-green-default"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit</a>

						<button type="submit" class="btn btn-default btn-red-default" data-token="{{ csrf_token() }}" data-url="{{ route('posts.destroy', $post->id) }}"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Delete</button>
					</div>
					<hr>
				@endforeach
			</div>
		</div>
		<div class="text-center">
			{!! $posts->links(); !!}
		</div>
	</div>
</div>
@stop

@section('script')
<script>
	$(document).ready(function(){

	/*	setTimeout(function() {
			alert('hello World');				
		}, 2500)*/

		

		$(".btn-red-default").click(function () {

			
			var token  	= $(this).attr("data-token");
			var url  	= $(this).attr("data-url");
			console.log(token);
			console.log(url);

			swal({
				  title: 'Are you sure?',
				  text: "You want to delete this post!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				})
				.then(function () {
					$.ajax({
						type: "DELETE",
						url: url,
						data: {_token :token}
					})
				  swal('Deleted!', 'Your post has been deleted.', 'success')
				  	setTimeout(function() {
							location.reload();
					}, 1500)
				})
		});

	});
</script>
@stop
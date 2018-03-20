		<div class="row">
			<div class="col-md-8 col-md-offset-2">
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

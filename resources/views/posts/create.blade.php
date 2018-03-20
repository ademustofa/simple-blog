@extends('layout.master')

@section('title', '| Create Post')

@section('konten')
<div class="konten">

	
	<div class="col-md-8 col-md-offset-2">
		<h3>Create New Post</h3>
		<br>
		{!! Form::open(array('route' => 'posts.store', 'files' => true)) !!}

			<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
			    {{ Form::label('title', 'Title:') }}
			    {{ Form::text('title', null, array('class' => 'form-control login-input')) }}
			    @if ($errors->has('title'))
	                <span class="help-block">
	                     <strong>{{ $errors->first('title') }}</strong>
	                </span>
	            @endif
		    </div>

			<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
				{{ Form::label('slug', 'Slug:') }}
			    {{ Form::text('slug', null, array('class' => 'form-control login-input')) }}
			    @if ($errors->has('slug'))
	                <span class="help-block">
	                     <strong>{{ $errors->first('slug') }}</strong>
	                </span>
	            @endif
			</div>

			<div class="form-group">
				{{ Form::label('category_id', 'Category:') }}
				<select class="form-control login-input" name="category_id">
					@foreach($categories  as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
	
			</div>
			
			<div class="form-group">
				{{ Form::label('tags', 'Tags:') }}
				<select class="form-control login-input select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				{{ Form::label('images', 'Upload Image') }}
				{{ Form::file('images') }}
			</div>
			
			
			<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
			    {{ Form::label('body', 'Text Body:') }}
			    {{ Form::textarea('body', null, array('class' => 'form-control textarea')) }}
			    @if ($errors->has('body'))
	                <span class="help-block">
	                     <strong>{{ $errors->first('body') }}</strong>
	                </span>
	            @endif
		    </div>

		    {{ Form::submit('Create Post', array('class' => 'btn btn-default btn-block btn-blue', 'style' => 'margin-top: 20px;')) }}

		{!! Form::close() !!}
		
	</div>
</div>
@stop

@section('script')
<script>
	$('.select2-multi').select2();
</script>
@stop
@extends('layout.master')

@section('title', '| View Post')

@section('konten')
<div class="konten">
	<div class="row">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}

		<div class="col-md-8">
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
				{{ Form::text('slug', null, ['class' => 'form-control login-input']) }}
				@if ($errors->has('slug'))
	                <span class="help-block">
	                     <strong>{{ $errors->first('slug') }}</strong>
	                </span>
	            @endif
			</div>

			<div class="form-group">
				{{ Form::label('category_id', 'Category:') }}
				{{ Form::select('category_id' ,$categories, null, array('class' => 'form-control login-input')) }}
			</div>

			<div class="form-group">
				{{ Form::label('tags', 'Tags:') }}
				{{ Form::select('tags[]' ,$tags, null, ['class' => 'form-control login-input select2-multi', 'multiple' => 'multiple']) }}		
			</div>

			<div class="form-group">
				{{ Form::label('images', 'Update Image') }}
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
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Create At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>last Update:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<a href="{{ route('posts.index') }}" class="btn btn-default btn-block btn-red"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;Cancel</a>
					</div>
					<div class="col-md-6">
							<button type="submit" class="btn btn-default btn-block btn-blue"><span class="glyphicon glyphicon-save"></span>&nbsp;&nbsp;Save Changes</button>

					</div>
				</div>

			</div>
		</div>
		{!! Form::close() !!}

	</div>
</div>	

@stop
@section('script')
<script>
	$('.select2-multi').select2();
	$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
</script>
@stop
@extends('layout.master')

@section('title', '| All Categories')

@section('konten')
<div class="konten">	
	<div class="wow" id="animate">
		<div class="success-message">
		   	<div class="alert alert-success" role="alert">
				<strong>Success:</strong> Categories was successfuly create
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="get-categories">
				
			</div>
		</div>
		<div class="col-md-3">
			<div class="well">
				<!-- {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!} -->

					<h2>New Categories</h2>

				    <!-- {{ Form::label('name', 'Name:') }}
				    {{ Form::text('name', null, ['class' => 'form-control categories']) }} -->

				    <label for="name">Name:</label>
				    <input type="text" class="form-control categories">
				    <br>

				    <!-- {{ Form::submit('Create New Categories', ['class' => 'btn btn-default btn-block btn-blue']) }} -->

				    <button class="btn btn-default btn-block btn-blue" data-token="{{ csrf_token() }}" data-url="{{ route('categories.store') }}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Create New Categories</button>
				    

				<!-- {!! Form::close() !!} -->
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
<script>
	$(document).ready(function(){

		var message = $("#animate");

		message.addClass("bounceInDown");

		setTimeout(function() {
			message.slideUp(300);
		}, 3000)

		/*$('.success-message').hide();*/

		var data_categories = function()
		{
		    $.ajax({
		          type : "GET",
		          url : "/get_categories",
		          success : function(data)
		          {
		            	$('.get-categories').html(data);        
		          },
		    });

		}
		setInterval(data_categories, 3000);

		$(document).on('click', '.btn-blue', function(){
			var token  	= $(this).attr("data-token");
			var url  	= $(this).attr("data-url");
			var name 	= $('.categories').val();
      		$('.categories').val('');

		  	$.ajax({
				   type	: "POST",
				   url	: url,
				   data : {name:name, _token :token},
				   /*success : function()
		          	{
		            	swal('Create Success!', 'New Categories has been created.', 'success');  
		          	},*/
			})
		});

		$(".btn-blue").click(function () {
			/*$('.success-message').show();
			$('.success-message').addClass("bounceInDown");*/
			setTimeout(function() {
				/*$('.success-message').removeClass("bounceInDown");*/
				$('.success-message').addClass("bounceOutUp").css("visibility", "hidden");
				 console.log('this function is running');
			}, 3000)
		})

	});
</script>
@stop
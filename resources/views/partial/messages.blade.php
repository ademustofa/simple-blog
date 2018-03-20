@if(Session::has('success'))
  	 <div class="success-message wow bounceInDown" id="alert">
	   	<div class="alert alert-success" role="alert">
			<strong>Success:</strong> {{ Session::get('success') }}
		</div>
	</div>
	@section('script')
	<script>
		$(document).ready(function(){
			setTimeout(function(){
				$('#alert').removeClass("bounceInDown");
			}, 1000)
	
			setTimeout(function() {
				$('.success-message').addClass("bounceOutUp");
				setTimeout(function() {
					$('.success-message').css("visibility", "hidden");
					console.log('alert added');
				}, 1000)
			}, 3000)
			
		})
	</script>
	@endsection

@endif

<!-- @if(count($errors) > 0)
	<div class="wow bounceInDown">
		<div class="alert alert-danger" role="alert">
			<h5 style="text-align:center;"><strong>Opss! Looks like something wrong</strong></h5>
			<br><br>
			<ol>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ol>
		</div>
	</div>
@endif -->






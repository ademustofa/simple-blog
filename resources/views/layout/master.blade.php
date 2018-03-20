<!DOCTYPE html>
<html>
    <head>
        <title>laravel Blog @yield('title')</title>

        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" media="screen" title="no title" charset="utf-8">

        <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="{{asset('assets/dist/sweetalert2.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">

         {{ Html::style('css/style.css') }}
         {{ Html::style('assets/css/animate.min.css') }}
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/wow.min.js')}}"></script>
        <script src="{{asset('assets/tinymce/tinymce.min.js')}}"></script>
        <script>
          tinymce.init({
              selector: '.textarea',
              plugins: 'link code'
          });
        </script>

        <script>
           new WOW().init();
        </script>

    </head>
    <body>	
    
		@include('partial.menu')

    <div class="container-fluid">
      <div class="col-md-12">
        <div class="content">
          
          @include('partial.messages')
          @yield('konten')
        </div>
      </div>
    </div>
		<br>
		<br>

		<!-- @include('partial.footer') -->
    
	  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
	  <!-- Default -->
  	<script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/dist/sweetalert2.min.js')}}"></script>
    <script>
      $(document).ready(function(){
        $(window).scroll(function(){
          var scroll = $(window).scrollTop();
          if (scroll > 100) {
            $(".navbar").css("background" , "#cccccc");
          }

          else{
            $(".navbar").css("background" , "none");    
          }
        })
    })
    </script>
  	@yield('script')

    </body>
</html>

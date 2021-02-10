<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('/js/jquery-3.3.1.js')}}"></script>
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset("/css/bootstrap.css") }}">


</head>
<body>

	<div class="container mt-5">
		<div class="row">
			<h3>Select Institute</h3>
			<div class="input-group">
			  <select class="custom-select" id="institute" name="institute">
			  	<option selected>Choose...</option>
			  	@foreach($institutes as $ins)
			  		<option value="{{ $ins->instituteID }}">{{$ins->instituteCode}}</option>
			  	@endforeach

			  </select>
			  <div class="input-group-append">
			    <button class="btn btn-outline-secondary" onclick="search()" type="button">Search</button>
			  </div>
			</div>
		</div>

		<div class="row mt-3">
			<a href="/panel/report" class="btn btn-outline-primary">BACK</a>
		</div>
	</div>

  	<script>
  		function search(){
  			// let instituteCode = document.getElementById('instituteCode');
  			// let insValue = instituteCode.options[instituteCode.selectedIndex].value;
  			let code = $("#institute :selected").text();
  			window.location = '/panel/report/books-by-institute/'+ code;
  		}
  	</script>

</body>


</html>

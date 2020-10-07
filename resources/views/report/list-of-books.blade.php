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
			<h3>List of Books</h3>
			<table class="table">
		    	<th>Thesis Title</th>
		    	<th>Thesis Description</th>
				<th>Author</th>
				<th>No of Views</th>
				<th>Program</th>
				@foreach($data as $datum)
					<tr>
						<td>{{ $datum->thesistitle }}</td>
						<td>{{ $datum->thesisdesc }}</td>
						<td>{{ $datum->author }}</td>
						<td>{{ $datum->noViews }}</td>
						<td>{{ $datum->programCode }}</td>
					</tr>
		    	@endforeach
    		</table>
		</div>

		<div class="row">
			<a href="/admin/report" class="btn btn-outline-primary">BACK</a>
		</div>
	</div>
    
  

</body>


</html>

@extends('layouts.adminlayout')

@section('content')



	<h1>Dashboard</h1>

	@if(session('error'))
	    <div class="alert alert-danger alert-dismissible fade show" role="alert">
	      <strong>ERROR!</strong> {{ session('error') }}
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
		</div>
	@endif
	@if(session('access'))
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>ACCESS DENIED!</strong> {{ session('access') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
  	@endif    


    
@endsection
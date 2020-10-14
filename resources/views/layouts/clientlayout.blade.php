<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/"> --}}

    <!-- Bootstrap core CSS -->


    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sticky-footer.css') }}">


    <script type="text/javascript" src="{{asset('/js/jquery-3.3.1.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
    <script type="text/javascript" src="{{asset('/js/jquery-ui.min.js')}}"></script>


    <link rel="stylesheet" type="text/css" href=" {{ asset("/css/style.css") }}">


    @yield('head-extrascript')

 

  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('img/logo-brand.png') }}" class="card-img-top" alt="...">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/client">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/client/search">Search</a>
        </li>
       
      </ul>

      <button class="btn btn-outline-success my-2 my-sm-0" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</button>

      <form id="logout-form" action="{{ route('logout') }}" class="form-inline my-2 my-lg-0">
        @csrf
        
      </form>
    </div>
  </nav>



  @yield('content')



  <footer class="footer">
    <div class="container">
      <div class="text-muted float-left">Theses Repository &copy; <strong>2020</strong>
      </div>

      <div class="text-muted float-right"> DEVELOPED BY <strong>JOMAR GROUP</strong></div>
     
    </div>
</footer>



    <script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/bootbox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/dataTables.bootstrap4.min.js')}}"></script>
      

    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("js/feather.min.js") }}"></script>  
    <script src="{{ asset("js/dashboard.js") }}"></script>
  

    @yield('bottom-extrascript')
    

  </body>

        {{-- <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script> --}}
</html>
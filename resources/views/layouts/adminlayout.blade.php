<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/"> --}}

    <!-- Bootstrap core CSS -->
    <script type="text/javascript" src="{{asset('/js/jquery-3.3.1.js')}}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href=" {{ asset("/css/dataTables.bootstrap4.min.css") }} ">

    <link rel="stylesheet" type="text/css" href=" {{ asset("/css/bootstrap-datepicker.css") }} ">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
      }

      .btn-edit{
        background-color: rgb(190, 41, 166);
        border-radius: 5px;
        color: white;
        font-size: medium;
        border: none;
      }

      .btn-delete{
        background-color: rgb(204, 38, 74);
        border-radius: 5px;
        color: white;
        font-size: medium;
        margin: 1px;
        border: none;
      }

      .btn-wrapper{
        margin: 1px;
      }

        .btn-link {
          background: none!important;
          border: none;
          padding: 0!important;
          /*optional*/
          font-family: arial, sans-serif;
          /*input has OS specific font-family*/
          color: #069;
          text-decoration: underline;
          cursor: pointer;
          text-decoration: none;
        }

      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset("css/dashboard.css") }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href=" {{ asset("/css/style.css") }}">

  </head>
  <body>

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Sample Admin</a>
        <a class="nav-link" href="#">WELCOME {{ ucfirst(Auth::user()->username) }}</a>
       

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </li>  
        </ul>
    </nav>

        <div class="container-fluid">
            <div class="row">
              <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link @if(request()->route()->getName() == 'home') active @endif" href="/admin/home">
                        <span data-feather="home"></span>
                        Dashboard
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link @if(request()->route()->getName() == 'institutes.index' ||
                      request()->route()->getName() == 'institutes.create' ||
                      request()->route()->getName() == 'institutes.edit') active @endif" href="/admin/institutes">
                        <span data-feather="file"></span>
                        Institutes {{ request()->route()->getName() == 'institutes' ? '<span class="sr-only">(current)</span>' : ''  }}
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link @if(request()->route()->getName() == 'programs.index' ||
                      request()->route()->getName() == 'programs.create' ||
                      request()->route()->getName() == 'programs.edit') active @endif" href="/admin/programs">
                        <span data-feather="book"></span>
                        Programs
                      </a>
                    </li>
          
                    <li class="nav-item">
                      <a class="nav-link @if(request()->route()->getName() == 'categories.index' ||
                      request()->route()->getName() == 'categories.create' ||
                      request()->route()->getName() == 'categories.edit') active @endif" href="/admin/categories">
                        <span data-feather="file"></span>
                        Categories {{ request()->route()->getName() == 'categories' ? '<span class="sr-only">(current)</span>' : ''  }}
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link @if(request()->route()->getName() == 'theses.index' ||
                      request()->route()->getName() == 'theses.create' ||
                      request()->route()->getName() == 'theses.edit') active @endif" href="/admin/theses">
                        <span data-feather="layers"></span>
                        Theses
                      </a>
                    </li>
          
                    <li class="nav-item">
                      <a class="nav-link @if(request()->route()->getName() == 'users.index' ||
                      request()->route()->getName() == 'users.create' ||
                      request()->route()->getname() == 'users.edit') active @endif" href="/admin/users">
                        <span data-feather="users"></span>
                        Users
                      </a>
                    </li>


                    <li class="nav-item">
                      <a class="nav-link @if(request()->route()->getName() == 'report.index' ||
                      request()->route()->getName() == 'report.create' ||
                      request()->route()->getname() == 'report.edit') active @endif" href="/admin/report">
                        <span data-feather="bar-chart-2"></span>
                        Reports
                      </a>
                    </li>


                    {{-- <li class="nav-item">
                      <a class="nav-link" href="#">
                        <span data-feather="bar-chart-2"></span>
                        Reports
                      </a>
                    </li> --}}
                 
                  </ul>
          
                 
              </nav>

              

              <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    
                    @yield('title')

                    
                </div>

                @yield('content')

              </main>

              
            </div>

            

        </div>

    


    
    <script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/bootbox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("js/feather.min.js") }}"></script>  
    <script src="{{ asset("js/dashboard.js") }}"></script>
  

    @yield('extrascript')
    

  </body>

        {{-- <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script> --}}
</html>
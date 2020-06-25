<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <title>Welcome Thesis Repository</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

        <script type="text/javascript" src="{{asset('/js/jquery-3.3.1.js')}}"></script>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
        <script type="text/javascript" src="{{asset('/js/jquery-ui.min.js')}}"></script>

    </head>

    <body>

        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">TBook</a>
          
             {{--  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> --}}
              <a class="btn btn-outline-success my-2 my-sm-0"
              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
          
        </nav>



        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/img/carousel/image-01.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Frist Image</h5>
                        <p>This is the first image</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/carousel/image-02.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Frist Image</h5>
                        <p>This is the first image</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/carousel/image-03.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Frist Image</h5>
                        <p>This is the first image</p>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <div class="container">
            <h2>Mostly Viewed...</h2>
        </div>


        <script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>

    </body>
</html>
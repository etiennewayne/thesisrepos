@extends('layouts.clientlayout')

@section('content')

        {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
        </div> --}}

        <div class="jumbotron">
            <h1 class="display-4">THESES REPOSITORY</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="/client/search" role="button">Search Thesis Now</a>
          </div>


        <div class="container mb-2">
            <div class="rows">
                <h3>Mostly Viewed Books</h3>
                <div class="card-deck">
                    @foreach ($theses as $thesis)
            
                        <div class="card" style="width: 18rem;">
                                <img src="{{ asset('img/logo.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $thesis->thesistitle }}</h5>
                                <p class="card-text">{{ $thesis->thesisdesc }}</p>
                                <p>No of Views : {{ $thesis->noViews }}</p>
                                {{-- <a href="/client/pdfviewer/{{ $thesis->thesisfileID }}/{{ $thesis->abstractfile }}" class="btn btn-primary">View File</a> --}}
                            </div>
                        </div>
                
                    @endforeach
            
                </div><!--rows-->

            </div>
          
        </div><!--container-->
    @endsection
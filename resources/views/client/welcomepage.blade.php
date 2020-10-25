@extends('layouts.clientlayout')

@section('content')

    <style>

        .jumbotron {
          background-image: url("../img/banner.jpg");
          background-size: cover;
        }
    </style>


        <div class="jumbotron">
            <h1 class="display-4">T-BOOK</h1>
            <p class="lead">Gov. Alfonso D. Tan College Thesis Repository System.</p>
            <hr class="my-4">
            <p>Digital copies of thesis papers of Students, Faculty and Staff of Gov. Alfonso D. Tan College.</p>
            <a class="btn btn-primary btn-lg" href="/client/search" role="button">Search Thesis Now</a>
        </div>


        <div class="container mb-2">
            <div class="rows">
                <div class="col-md-12">

                    <h3>Mostly Viewed Books</h3>

                    @foreach ($theses as $thesis)
                        <div class="card float-left" style="width: 20rem; margin: 5px;">
                                <img src="{{ asset('img/logo.png') }}" class="card-img-top" alt="...">
                            <div class="card-body" style="height: 200px; overflow:hidden;">
                                <h5 class="card-title text-truncate">{{ $thesis->thesistitle }}</h5>
                                <p class="card-text text-truncate">{{ $thesis->thesisdesc }}</p>
                                <p>No of Views : {{ $thesis->noViews }}</p>
                                {{-- <a href="/client/pdfviewer/{{ $thesis->thesisfileID }}/{{ $thesis->abstractfile }}" class="btn btn-primary">View File</a> --}}
                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="clearfix"></div>



            </div>
        </div>

        <br><br>


    @endsection



@section('bottom-extrascript')

    <script !src="">
        $(document).ready(function(){


        });
    </script>

@endsection

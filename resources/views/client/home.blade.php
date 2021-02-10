@extends('layouts.clientlayout')


    @section('head-extrascript')

    <script type="text/javascript">

      function getMessage() {

          var key = $('#txtsearch').val();
          if (key.length < 1){
            displayDefault();
            return;
          }

            $.ajax({
              type:'GET',
              url:'/client/home/search/'+key,

               success:function(data) {
                  $("#msg").html(data);

                   //console.log(data);
               }
            });

         }


         function displayDefault(){
          $.ajax({
              type:'GET',
              url:'/client/home/search/g',

               success:function(data) {
                  $("#msg").html(data);

                   //console.log(data);
               }
            });
         }

        // $(document).ready(function(){
        //   $("#txtsearch").autocomplete({
        //     //source: "/client/autocomplete/search"
         //   source: 'http://127.0.0.1:8000/client/autocomplete/search'
        //   });

        //    console.log('loaded');
        // });


        $(document).ready(function() {
          displayDefault();
          //getMessage();

            var sourceData = [{
              'name' : 'test',

            },
            {
              'name' : 'name2'
            }];


            // var xmlhttp = new XMLHttpRequest();
            // xmlhttp.onreadystatechange = function() {
            //   if (this.readyState == 4 && this.status == 200) {
            //     var myObj = JSON.parse(this.responseText);
            //     alert(myObj[0].thesistitle);
            //     console.log(this.responseText);
            //   }
            // };
            // xmlhttp.open("GET", "autocomplete/search", true);
            // xmlhttp.send();

            var sourceData = function (request, response) {
                $.getJSON(
                    "/client/autocomplete/search/" + request.term,
                    function (data) {
                        response(data);
                    });
            };


              $("#txtsearch").focus(function(){

                $( "#txtsearch" ).autocomplete({
                    source: sourceData
                });
                  //console.log(sourceData);

              });


        });

        </script>

    @endsection


    @section('content')



<div class="container">

  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>ERROR!</strong> {{ session('error') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <div class="row" style="margin-top: 20px;">
    <div class="col-md-12">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Thesis Book here..." aria-label="Search Thesis Book here..." aria-describedby="basic-addon2" name="txtsearch" id="txtsearch" autocomplete="off">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="btnsearch" name="btnsearch" onclick="getMessage()">SEARCH</button>
        </div>
      </div>
    </div>
  </div>  {{-- close row --}}


  <div class="row">
      <div class="col-md-12">
          <div id = 'msg' class="">Search result will appear here...</div>
      </div>
  </div>  {{-- close row --}}



</div> {{-- close container --}}


<br><br>


   <script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>

@endsection



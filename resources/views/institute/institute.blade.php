@extends('layouts.adminlayout')

@section('title')

  <h1>Programs</h1>

@endsection

@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>SAVED!</strong> {{session('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif

    @if(session('deleted'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>DELETED!</strong> {{session('deleted')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif

    @if(session('updated'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>UPDATED!</strong> {{session('updated')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif

    @if(session('active'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>ACTIVE!</strong> {{session('updated')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif

    <div class="row padding-left-40">
        <table id="institute" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                     <th>ID</th>
                     <th>Institute Code</th>
                     <th>Institute Description</th>
                     <th>Action</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Institute Code</th>
                    <th>Institute Description</th>
                    <th>Action</th>
                     
                  </tr>
              </tfoot>
          </table>

    </div><!--close div table-->

    <div class="padding-left-40">
      <a href="/institutes/create" class="btn btn-primary mybtn">Add Institute</a>
    </div>

@endsection

@section('extrascript')


<script type="text/javascript">

    $(document).ready(function() {
        var table = $('#institute').DataTable({
            processing: true,
            ajax: {
                url: '/theses/ajax/institutes',
                dataSrc: ''
            },
            columns: [
                { data: 'instituteID' },
                { data: 'instituteCode' },
                { data: 'instituteDesc' },
                {
                    defaultContent: '<div class="btn-wrapper"><button class="btn-edit" id="edit">Edit</button><button class="btn-delete" id="delete">Delete</button></div>'
                },
               
            ],
        });



        $('#institute tbody').on( 'click', '#edit', function () {
            var data = table.row( $(this).parents('tr') ).data();
            
            var id = data['instituteID'];
            window.location = '/institutes/'+id+'/edit' ;
            
        });//criteria click edit

        $('#institute tbody').on( 'click', '#delete', function () {
            var data = table.row( $(this).parents('tr') ).data();

            var id = data['instituteID'];
            var contentText = data['instituteCode'];

            var token = $("meta[name=csrf-token]").attr('content');
            var method = $("input[name=_method]").val();

            bootbox.confirm({
                message: "Are you sure you want to delete "+contentText + "?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    console.log('This was logged in the callback: ' + result);
                    if(result){
                        $.post('/institutes/'+ id,
                            {
                                _token : token,
                                _method : 'DELETE'
                            },
                                            
                            function(data, status){               
                                if(status=="success"){
                                    $('#institute').DataTable().ajax.reload();
                                   // alert('Deleted successfully');
                                }else{
                                    alert('An error occured. ERROR : ' +status);
                                }
                                
                            }
                        );//post
                    }
    
                }//callback
            });//bootbox
        });//criteria click delete
        

    });
</script>


@endsection

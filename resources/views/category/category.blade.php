@extends('layouts.adminlayout')

@section('title')
  <h3>Categories</h3>
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
          	<table id="categories" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>programid</th>
                    <th>Program Code</th>
                    <th>programdesc</th>
                    <th>instituteid</th>
                    <th>Institute Code</th>
                    <th>Institute desc</th>
                    <th>Action</th>
                </tr>
                </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>programid</th>
                        <th>Program Code</th>
                        <th>programdesc</th>
                        <th>instituteid</th>
                        <th>Institute Code</th>
                        <th>Institute desc</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
              </table>

      </div><!--close div table-->

        <div class="padding-left-40">
          <a href="/panel/categories/create" class="btn btn-primary mybtn">Add Category</a>
        </div>



@endsection

@section('extrascript')

<script type="text/javascript">

    $(document).ready(function() {
        var table = $('#categories').DataTable({
            processing: true,
            ajax: {
                url: '/panel/categories/ajax/categories',
                dataSrc: ''
            },
            columns: [
                { data: 'categoryID' },
                { data: 'category' },
                { data: 'programID', visible: false},
                { data: 'programCode' },
                { data: 'programDesc', visible: false},
                { data: 'instituteID', visible: false},
                { data: 'instituteCode' },
                { data: 'instituteDesc', visible: false },
                {
                    defaultContent: '<div class="btn-wrapper"><button class="btn-edit" id="edit">Edit</button><button class="btn-delete" id="delete">Delete</button></div>'
                },

            ],
        });



        $('#categories tbody').on( 'click', '#edit', function () {
            var data = table.row( $(this).parents('tr') ).data();

            var id = data['categoryID'];
            window.location = '/panel/categories/'+id+'/edit' ;

        });//criteria click edit

        $('#categories tbody').on( 'click', '#delete', function () {
            var data = table.row( $(this).parents('tr') ).data();

            var id = data['categoryID'];
            var contentText = data['category'];

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
                        $.post('/panel/categories/'+ id,
                            {
                                _token : token,
                                _method : 'DELETE'
                            },

                            function(data, status){
                                if(status=="success"){
                                    $('#categories').DataTable().ajax.reload();
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


    });//document ready
</script>


@endsection

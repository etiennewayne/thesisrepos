@extends('layouts.adminlayout')

@section('title')

  <h1>Users</h1>

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
        <table id="users" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <th>ID</th>
                      <th>ID No</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>password</th>
                    <th>remember_token</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>programID</th>
                    <th>Position</th>
                    <th>Program</th>
                    <th>programdesc</th>
                    <th>insituteid</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>

              </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>ID No</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>password</th>
                        <th>remember_token</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>programID</th>
                        <th>Position</th>
                        <th>Program</th>
                        <th>programdesc</th>
                        <th>insituteid</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
          </table>

    </div><!--close div table-->

    <div class="row padding-left-40">
        <a href="/panel/users/create" class="btn btn-primary mybtn">Add User</a>
        <a href="/panel/uploader/users" class="btn btn-primary mybtn" style="margin-left: 20px;">Upload Users</a>

    </div>



@endsection

@section('extrascript')



<script type="text/javascript">

    $(document).ready(function() {
        var table = $('#users').DataTable({
            processing: true,
            ajax: {
                url: '/users/ajax/users',
                dataSrc: ''
            },
            columns: [
                { data: 'id', visible: false },
                { data: 'username' },
                { data: 'lname',},
                { data: 'fname' },
                { data: 'mname', },
                { data: 'password', visible: false},
                { data: 'remember_token', visible: false},
                { data: 'created_at', visible: false},
                { data: 'updated_at', visible: false},
                { data: 'programID', visible: false},
                { data: 'position' },
                { data: 'programCode' },
                { data: 'programDesc', visible: false },
                { data: 'instituteID', visible: false },
                {
                    defaultContent: '<div class="btn-wrapper"><button class="btn-edit" id="edit">Edit</button><button class="btn-delete" id="delete">Delete</button></div>'
                },

            ],
        });



        $('#users tbody').on( 'click', '#edit', function () {
            var data = table.row( $(this).parents('tr') ).data();

            var id = data['id'];
            window.location = '/panel/users/'+id+'/edit' ;

        });//criteria click edit

        $('#users tbody').on( 'click', '#delete', function () {
            var data = table.row( $(this).parents('tr') ).data();

            var id = data['id'];
            var contentText = data['lname'];

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
                        $.post('/panel/users/'+ id,
                            {
                                _token : token,
                                _method : 'DELETE'
                            },

                            function(data, status){
                                if(status=="success"){
                                    $('#users').DataTable().ajax.reload();
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

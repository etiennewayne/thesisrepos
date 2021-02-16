@extends('layouts.adminlayout')

@section('title')

  <h1>Students</h1>

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


    <div class="form-group row padding-left-40" style="margin-bottom: 40px;">
        <label for="acode" class="col-form-label text-md-right">{{ __('Academic Year Code') }}</label>

        <div class="col-md-5">
            <select name="acode" id="aycode" class="form-control">
                @foreach ($ays as $ay)
                    <option value="{{ $ay->acode }}">{{ $ay->acode }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-5">
            <button class="btn btn-primary" id="btnsearch" >SEARCH</button>
        </div>
    </div>

    <div class="row padding-left-40">


        <table id="students" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <th>ID</th>
                        <th>ID No</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>programID</th>
                        <th>Program</th>
                        <th>Position</th>
                        <th>Password Text</th>
                        <th>Academic Year</th>
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
                        <th>programID</th>
                        <th>Program</th>
                        <th>Position</th>
                        <th>Password Text</th>
                        <th>Academic Year</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
          </table>

    </div><!--close div table-->

    <div class="row padding-left-40">
        <a href="/panel/students/create" class="btn btn-primary mybtn">Add Student</a>
        <a href="/panel/uploader/students" class="btn btn-primary mybtn" style="margin-left: 20px;">Upload Student</a>
        <button href="#" class="btn btn-danger mybtn" id="btndelete" style="margin-left: 20px;">Delete Students</button>
        {{--<a href="/panel/uploader/users" class="btn btn-primary mybtn" style="margin-left: 20px;">Download Users</a>--}}
    </div>





@endsection

@section('extrascript')

<script type="text/javascript" src="{{ asset('/js/dataTables.buttons.min.js') }}"></script>
<script src="/js/jszip.min.js"></script>

<script src="/js/buttons.html5.min.js"></script>
<script src="/js/buttons.print.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        var aycode='';

        var token = $("meta[name=csrf-token]").attr('content');
        var method = $("input[name=_method]").val();


        var table = $('#students').DataTable({
            processing: true,
            dom: 'Bfrtip',

            buttons: [
                {
                    extend:  'excel',
                    text: 'Download Students',
                    filename: 'users',
                    messageTop: 'Users',
                    exportOptions: {
                        columns: [1,2,3,4,6,7,8,9]
                    }
                }


            ],

            ajax: {
                url: '/students/ajax/students?acode=' + aycode,
                dataSrc: ''
            },
            columns: [
                { data: 'id', visible: false },
                { data: 'username' },
                { data: 'lname',},
                { data: 'fname' },
                { data: 'mname', },
                { data: 'programID', visible: false},
                { data: 'programCode' },
                { data: 'position' },
                { data: 'apwd', visible: false },
                { data: 'acode' },
                {
                    defaultContent: '<div class="btn-wrapper"><button class="btn-edit" id="edit">Edit</button><button class="btn-delete" id="delete">Delete</button></div>'
                },

            ],
        });




        $('#btnsearch').click(function(){
            aycode = $('#aycode').val();
            table.ajax.url('/students/ajax/students?acode=' + aycode);
           // alert(table.ajax.url());
            table.ajax.reload();
           // $('#students').DataTable().ajax.reload();
        });


        $('#students tbody').on( 'click', '#edit', function () {
            var data = table.row( $(this).parents('tr') ).data();

            var id = data['id'];
            window.location = '/panel/students/'+id+'/edit' ;

        });//criteria click edit

        $('#students tbody').on( 'click', '#delete', function () {
            var data = table.row( $(this).parents('tr') ).data();

            var id = data['id'];
            var contentText = data['lname'];



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
                        $.post('/panel/students/'+ id,
                            {
                                _token : token,
                                _method : 'DELETE'
                            },

                            function(data, status){
                                if(status=="success"){
                                    $('#students').DataTable().ajax.reload();
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



        $('#btndelete').click(function(){
            aycode = $('#aycode').val();
            if(aycode !==''){
                deleteByAcademicYear(aycode);
            }
        });


        function deleteByAcademicYear(n){
            $.post('/students/ajax/delete/'+ n,
                {
                    _token : token,
                },

                function(data, status){
                    if(status=="success"){
                        $('#students').DataTable().ajax.reload();
                        // alert('Deleted successfully');
                    }else{
                        alert('An error occured. ERROR : ' +status);
                    }

                }
            );//post
        }


    });//document ready
</script>


@endsection

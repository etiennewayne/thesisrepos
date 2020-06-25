@extends('layouts.adminlayout')

@section('title')
    <h3>Theses</h3>
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


        <!-- Modal -->
        <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this data?
                        <input type="text" id="rowid" name="rowid">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="row padding-left-40">
            <table id="theses" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Thesis Title</th>
                        <th>Thesis Description</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Program Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                 
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Thesis Title</th>
                        <th>Thesis Description</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Program Code</th>
                        <th width="140px">Action</th>
                    </tr>
                </tfoot>
            </table>

        </div><!--close div table-->



        <div>
            <a href="/theses/create" class="btn btn-primary">Upload Thesis</a>
        </div>


@endsection

@section('extrascript')



<script type="text/javascript">

    $(document).ready(function() {
        var table = $('#theses').DataTable({
            processing: true,
            ajax: {
                url: '/theses/ajax/theses',
                dataSrc: ''
            },
            columns: [
                { data: 'thesisfileID' },
                { data: 'thesistitle' },
                { data: 'thesisdesc' },
                { data: 'author' },
                { data: 'category' },
                { data: 'programCode' },
                {
                    defaultContent: '<div class="btn-wrapper"><button class="btn-edit" id="edit">Edit</button><button class="btn-delete" id="delete">Delete</button></div>'
                },
               
            ],
        });



        $('#theses tbody').on( 'click', '#edit', function () {
            var data = table.row( $(this).parents('tr') ).data();
            
            var id = data['thesisfileID'];
            window.location = '/theses/'+id+'/edit' ;
            
        });//criteria click edit

        $('#theses tbody').on( 'click', '#delete', function () {
            var data = table.row( $(this).parents('tr') ).data();

            var id = data['thesisfileID'];
            var contentText = data['thesistitle'];

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
                        $.post('/theses/'+ id,
                            {
                                _token : token,
                                _method : 'DELETE'
                            },
                                            
                            function(data, status){               
                                if(status=="success"){
                                    $('#theses').DataTable().ajax.reload();
                                    alert('Deleted successfully');
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

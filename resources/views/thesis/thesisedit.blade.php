@extends('layouts.adminlayout')

@section('title')
	<h3>Update Thesis</h3>
@endsection



@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload Thesis') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/theses/{{ $thesis->thesisfileID }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="programid" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <select name="programid" class="form-control"> {{ $thesis->programID }}
                                    @foreach($programs as $program)
                                        @if($program->programID == $thesis->programID)
                                             <option selected="selected" value="{{ $program->programID  }}">{{ $program->programCode  }}</option>
                                        @else
                                            <option value="{{ $program->programID  }}">{{ $program->programCode  }}</option>
                                        @endif
                                       
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="thesistitle" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <textarea class="form-control @error('thesistitle') is-invalid @enderror" id="thesistitle"  name="thesistitle" rows="3" required>{{ $thesis->thesistitle }}</textarea>
                                </div>

                                @error('thesistitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="thesisdesc" class="col-md-4 col-form-label text-md-right">{{ __('Thesis Description') }}</label>

                            <div class="col-md-6">

                                <div class="form-group">
                                  
                                    <textarea class="form-control @error('thesisdesc') is-invalid @enderror" id="thesisdesc" name="thesisdesc" rows="3" required>{{ $thesis->thesisdesc }}</textarea>
                                </div>
                                @error('thesisdesc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                            <div class="col-md-6">

                                <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ $thesis->author }}" required autocomplete="off" autofocus>

                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="datesubmitted" class="col-md-4 col-form-label text-md-right">{{ __('Date Submitted') }}</label>

                            <div class="col-md-6">
                                <div class="datepicker date input-group p-0 shadow-sm">
                                    <input type="text" name="datesubmitted" placeholder="Submitted Date" value="{{ $thesis->datesubmitted }}" class="form-control py-4 px-4" id="datesubmitted">
                                    <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span></div>
                                </div>

                                @error('tagwords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="tagwords" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                            <div class="col-md-6">
                                <input id="tagwords" type="text" class="form-control @error('tagwords') is-invalid @enderror" name="tagwords" value="{{ $thesis->tagWords }}" autocomplete="tagwords" autofocus>

                                @error('tagwords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <select name="categoryid" class="form-control">
                                    @foreach($categories as $category)
                                    @if($thesis->programID  == $category->categoryID)
                                        <option selected value="{{ $category->categoryID  }}">{{ $category->category  }}</option>
                                    @else
                                        <option value="{{ $category->categoryID  }}">{{ $category->category  }}</option>
                                    @endif
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Thesis File') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extrascript')

<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>


<script>
    $(function () {

        // INITIALIZE DATEPICKER PLUGIN
        $('.datepicker').datepicker({
            clearBtn: true,
            format: "yyyy/mm/dd"
        });


        // FOR DEMO PURPOSE
        $('#reservationDate').on('change', function () {
            var pickedDate = $('input').val();
            $('#pickedDate').html(pickedDate);
        });
    });

</script>
@endsection

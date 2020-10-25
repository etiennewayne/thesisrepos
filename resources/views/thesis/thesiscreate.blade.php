@extends('layouts.adminlayout')

@section('title')
    <h3>Add Thesis</h3>
@endsection

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload Thesis') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/theses" enctype="multipart/form-data">
                        @csrf



                        <div class="form-group row">
                            <label for="programid" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <select name="programid" class="form-control">
                                    @foreach($programs as $program)
                                        <option value="{{ $program->programID  }}">{{ $program->programCode  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="thesistitle" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <textarea maxlength="200" class="form-control @error('thesistitle') is-invalid @enderror" id="thesistitle" name="thesistitle" rows="3" required></textarea>
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
                                    <textarea maxlength="200" class="form-control @error('thesisdesc') is-invalid @enderror" id="thesisdesc" name="thesisdesc" rows="3" required></textarea>
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

                                <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required autocomplete="off" autofocus>

                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="abstractfile" class="col-md-4 col-form-label text-md-right">{{ __('Thesis File') }}</label>
                            <div class="col-md-6">
                                <label for="abstractfile">Thesis File</label>
                                <input type="file" class="form-control-file @error('abstractfile') is-invalid @enderror" id="abstractfile" name="abstractfile">

                                 @error('abstractfile')
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
                                    <input type="text" name="datesubmitted" placeholder="Submitted Date" class="form-control py-4 px-4" id="datesubmitted">
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
                                <input id="tagwords" type="text" class="form-control @error('tagwords') is-invalid @enderror" name="tagwords" value="{{ old('tagwords') }}" autocomplete="tagwords" autofocus>

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
                                        <option value="{{ $category->categoryID  }}">{{ $category->category  }}</option>
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
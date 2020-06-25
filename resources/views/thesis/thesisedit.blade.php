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
                    <form method="POST" action="/theses/{{ $thesis->thesisfileID }}" enctype="multipart/form-data">
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
                                <input id="thesistitle" type="text" class="form-control @error('thesistitle') is-invalid @enderror" name="thesistitle" value="{{ $thesis->thesistitle }}" required autocomplete="off" autofocus>

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

                                <input id="thesisdesc" type="text" class="form-control @error('thesisdesc') is-invalid @enderror" name="thesisdesc" value="{{ $thesis->thesisdesc }}" required autocomplete="off" autofocus>

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


                      {{--   <div class="form-group row">
                            <label for="abstractfile" class="col-md-4 col-form-label text-md-right">{{ __('Abstract File') }}</label>
                            <div class="col-md-6">
                                <label for="abstractfile">Abstract File</label>
                                <input type="file" class="form-control-file @error('abstractfile') is-invalid @enderror" id="abstractfile" name="abstractfile">

                                 @error('abstractfile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="thesisfile" class="col-md-4 col-form-label text-md-right">{{ __('Thesis File') }}</label>
                            <div class="col-md-6">
                                <label for="thesisfile">Thesis File</label>
                                <input type="file" class="form-control-file @error('thesisfile') is-invalid @enderror" id="thesisfile" name="thesisfile">

                                  @error('thesisfile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        
                        {{--<div class="form-group row">--}}
                            {{--<label for="abstractfile" class="col-md-4 col-form-label text-md-right">{{ __('Abstract File') }}</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="custom-file">--}}
                                    {{--<input type="file" name="abstractfile" class="custom-file-input" id="abstractfile" aria-describedby="inputGroupFileAddon01">--}}
                                    {{--<label class="custom-file-label" for="abstractfile">Choose file (Abstract)</label>--}}
                                {{--</div>--}}
                            {{--</div>	--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">  --}}
                            {{--<label for="thesisfile" class="col-md-4 col-form-label text-md-right">{{ __('Thesis File') }}</label>             --}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="custom-file">--}}
                                    {{--<input type="file" class="custom-file-input" name="thesisfile" id="thesisfile" aria-describedby="inputGroupFileAddon01">--}}
                                    {{--<label class="custom-file-label" for="thesisfile">Choose file (Thesis File)</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{----}}
                        {{--</div>--}}


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
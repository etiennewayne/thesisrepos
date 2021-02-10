@extends('layouts.adminlayout')

@section('title')
    <h3>Add Category</h3>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category Information</div>

                <div class="card-body">
                <form method="POST" action="/panel/categories">
                        @csrf

                        <div class="form-group row">

                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="category" class="form-control @error('category') is-invalid @enderror" name="category" rows="3" value="{{ old('category') }}" required autocomplete="off" autofocus />

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <!-- Choices of answer -->
                        <div class="form-group row">
                            <label for="programid" class="col-md-4 col-form-label text-md-right">{{ __('Programs') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="programid" id="programid" required>
                                    @foreach($programs as $program)
                                         <option value="{{ $program->programID }}">{{ $program->programCode }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width:100%;">
                                    {{ __('Save') }}
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

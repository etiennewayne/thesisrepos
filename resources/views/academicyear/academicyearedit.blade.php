@extends('layouts.adminlayout')

@section('title')
    <h3>Add Academic Year</h3>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Academic Year Information</div>

                <div class="card-body">
                <form method="POST" action="/panel/academicyear/{{ $ay->ayear_id }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">

                            <label for="acode" class="col-md-4 col-form-label text-md-right">{{ __('AY Code') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="acode" class="form-control @error('acode') is-invalid @enderror" name="acode" rows="3" value="{{ $ay->acode }}" 
                                    required autocomplete="off" autofocus />

                                @error('acode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Please input academic year code.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- Choices of answer -->
                        <div class="form-group row">
                            <label for="acode_desc" class="col-md-4 col-form-label text-md-right">{{ __('Academic Year Description') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="acode_desc" class="form-control @error('acode_desc') is-invalid @enderror" name="acode_desc" rows="3" value="{{ $ay->acode_desc }}" 
                                required autocomplete="off" autofocus />

                                @error('acode_desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Please input academic year description.</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width:100%;">
                                    {{ __('Update') }}
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

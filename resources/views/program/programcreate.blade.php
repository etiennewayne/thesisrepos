@extends('layouts.adminlayout')

@section('title')
    <h3>Add Program</h3>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Program Information</div>

                <div class="card-body">
                <form method="POST" action="/panel/programs">
                        @csrf

                        <div class="form-group row">
                            <label for="programCode" class="col-md-4 col-form-label text-md-right">{{ __('Program Code') }}</label>

                            <div class="col-md-6">
                                <input id="programCode" type="text" class="form-control @error('programCode') is-invalid @enderror" name="programCode" value="{{ old('programCode') }}" required autocomplete="off" autofocus>

                                @error('programCode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="programDesc" class="col-md-4 col-form-label text-md-right">{{ __('Program Description') }}</label>

                            <div class="col-md-6">
                                <input id="programDesc" type="text" class="form-control @error('programDesc') is-invalid @enderror" name="programDesc" value="{{ old('programDesc') }}" required autocomplete="off" autofocus>

                                @error('programDesc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <!-- Choices of answer -->
                        <div class="form-group row">
                            <label for="instituteCode" class="col-md-4 col-form-label text-md-right">{{ __('Institute') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="instituteCode" id="instituteCode" required>
                                   @foreach ($institutes as $ins)
                                        <option value="{{ $ins->instituteID }}">{{ $ins->instituteCode }}</option>
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

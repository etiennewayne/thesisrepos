@extends('layouts.adminlayout')

@section('title')
<h3>Add Institute</h3>
@endsection



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Institute Information</div>

                <div class="card-body">
                <form method="POST" action="/institutes">
                        @csrf

                        <div class="form-group row">
                            <label for="instituteCode" class="col-md-4 col-form-label text-md-right">{{ __('Institute Code') }}</label>

                            <div class="col-md-6">
                                <input id="instituteCode" type="text" class="form-control @error('instituteCode') is-invalid @enderror" name="instituteCode" value="{{ old('instituteCode') }}" required autocomplete="off" autofocus>

                                @error('instituteCode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="instituteDesc" class="col-md-4 col-form-label text-md-right">{{ __('Institute Description') }}</label>

                            <div class="col-md-6">
                                <input id="instituteDesc" type="text" class="form-control @error('instituteDesc') is-invalid @enderror" name="instituteDesc" value="{{ old('instituteDesc') }}" required autocomplete="off" autofocus>

                                @error('instituteDesc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <!-- Choices of answer -->
                        {{-- <div class="form-group row">
                            <label for="instituteCode" class="col-md-4 col-form-label text-md-right">{{ __('Institute') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="instituteCode" id="instituteCode" required>
                                   @foreach ($institutes as $ins)
                                        <option value="{{ $ins->instituteID }}">{{ $ins->instituteCode }}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div> --}}

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

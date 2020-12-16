@extends('layouts.adminlayout')


@section('title')
    <h3>Add User</h3>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/users/{{ $user->id }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" readonly="readonly" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ $user->lname }}" required autocomplete="lname" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ $user->fname }}" required autocomplete="fname" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mname" class="col-md-4 col-form-label text-md-right">{{ __('Middlename') }}</label>

                            <div class="col-md-6">
                                <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ $user->mname }}" autocomplete="mname" autofocus>

                                @error('mname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      


                        <div class="form-group row">
                            <label for="programID" class="col-md-4 col-form-label text-md-right">{{ __('Program Code') }}</label>

                            <div class="col-md-6">
                                <select name="programID" class="form-control">
                                    @foreach ($programs as $program)
										@if($user->programCode == $program->programCode)
											<option selected="selected" value="{{ $program->programID }}">{{ $program->programCode }}</option>
										@else
											<option value="{{ $program->programID }}">{{ $program->programCode }}</option>
										@endif
                                    @endforeach
                                </select>
                            </div>
                            
                           
                        </div>


						<div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                            <div class="col-md-6">
                                <select name="position" class="form-control">
                                    <option @if ($user->position == 'ADMINISTRATOR') selected="selected" @endif) value="ADMINISTRATOR"> ADMINISTRATOR</option>
                                    <option @if ($user->position == 'STUDENT') selected="selected" @endif)  value="STUDENT">STUDENT</option>
                                    <option @if ($user->position == 'FACULTY') selected="selected" @endif)  value="STUDENT">FACULTY</option>
                                    <option @if ($user->position == 'STAFF') selected="selected" @endif)  value="STUDENT">STAFF</option>
                                    <option @if ($user->position == 'RESEARCH PERSONNEL') selected="selected" @endif)  value="RESEARCH PERSONNEL">RESEARCH PERSONNEL</option>
                                </select>
                            </div>                   
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div><!--card body-->
            </div>
        </div>
    </div>
</div>
@endsection

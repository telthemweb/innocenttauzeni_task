@extends('layouts.main')

@section('content')
    <div class="container-fluid px-xl-5 mt-lg-5 mb-lg-5">

        <div class="container">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>UPDATE EQUIPMENT INFORMATION</span><small class="px-1"></small></h6>
                            </div>

                            <div class="py-1">
                                <form method="POST" action="{{ route('equipment.update',$equipment->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="col-md-4 col-form-label text-md-start">{{ __('Equipment Name') }}</label>
                                                <div class="rounded">
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="{{$equipment->name}}" name="name" value="{{ old('name') }}"
                                                        required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-start">{{ __('Equipment Type') }}</label>
                                                <div class="rounded">
                                                    <select class="form-control @error('type') is-invalid @enderror"
                                                        name="type" id="type" required="required">
                                                        <option value="{{$equipment->type}}" disabled selected>{{$equipment->type}}
                                                        </option>
                                                        <option value="Electronics">Electronics</option>
                                                        <option value="Tensil">Tensil</option>

                                                    </select>
                                                    @error('type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="model"
                                                    class="col-md-4 col-form-label text-md-start">{{ __('Equipment Model') }}</label>
                                                <div class="rounded">
                                                    <input id="model" type="text"
                                                        class="form-control @error('model') is-invalid @enderror"
                                                        value="{{$equipment->model}}" name="model" value="{{ old('model') }}"
                                                        required autocomplete="model" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-start">{{ __('Equipment Status') }}</label>
                                                <div class="rounded">
                                                    <select class="form-control @error('status') is-invalid @enderror"
                                                        name="status" id="status" required="required">
                                                        <option value="" disabled selected>Select Equipment Status
                                                        </option>
                                                        <option value="true">Brand New</option>
                                                        <option value="false">Old</option>

                                                    </select>
                                                    @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-start">{{ __('Equipment Availability') }}</label>
                                                <div class="rounded">
                                                    <select class="form-control @error('availability') is-invalid @enderror"
                                                        name="availability" id="availability" required="required">
                                                        <option value="{{$equipment->availability}}" disabled selected>{{$equipment->availability}}</option>
                                                        <option value="Available">Available</option>
                                                        <option value="Not Available">Not Available</option>

                                                    </select>
                                                    @error('availability')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary float-right">
                                                {{ __('SUBMIT') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

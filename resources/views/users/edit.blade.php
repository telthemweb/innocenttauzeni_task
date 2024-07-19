@extends('layouts.main')

@section('content')
    <div class="container-fluid px-xl-5 mt-lg-5 mb-lg-5">

        <div class="container">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div  class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>UPDATE  USER INFORMATION</span><small class="px-1"></small></h6>
                            </div>

                            <div class="py-1">
                                <form method="POST" action="{{route('user.update', $user->id)}}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="col-md-4 col-form-label text-md-start">{{ __('Name') }}</label>
                                                <div class="rounded">
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="{{$user->name}}" name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"
                                                    class="col-md-4 col-form-label text-md-start">{{ __('Email') }}</label>
                                                <div class="rounded">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="{{$user->email}}" name="email" value="{{ old('email') }}"
                                                        required autocomplete="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"
                                                    class="col-md-4 col-form-label text-md-start">{{ __('Phone') }}</label>
                                                <div class="rounded">
                                                    <input id="text" type="text"
                                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                        value="{{$user->phone}}" value="{{ old('phone') }}" required
                                                        autocomplete="phone">
                                                    @error('email')
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
                                                    class="col-md-4 col-form-label text-md-start">{{ __('Gender') }}</label>
                                                <div class="rounded">
                                                    <select class="form-control @error('gender') is-invalid @enderror"
                                                        name="gender" id="gender" required="required">
                                                        <option value="{{$user->gender}}" disabled selected>{{$user->gender}}</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
        
                                                    </select>
                                                    @error('gender')
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

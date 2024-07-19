@extends('layouts.main')

@section('content')
    <div class="container-fluid px-xl-5 mt-lg-5 mb-lg-5">

        <div class="container">
            <div class="row flex-lg-nowrap">
                <div class="col-lg-12">
                    <div  class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="mr-2"><span>ASSIGN {{$equipment->name}}</span><small class="px-1"></small></h6>
                            </div>

                            <div class="py-1">
                                <form method="POST" action="{{route('assignequipment')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="role"
                                                    class="col-md-4 col-form-label text-md-start">{{ __('Select User') }}</label>
                                                <div class="rounded">
                                                    <select class="form-control" name="user_id" id="user_id">
                                                        <option value="">Select User</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="col-md-4 col-form-label text-md-start">{{ __('Return Date') }}</label>
                                                <div class="rounded">
                                                    <input id="return_date" type="date"
                                                        class="form-control @error('return_date') is-invalid @enderror"
                                                        value="{{$user->name}}" name="return_date" value="{{ old('return_date') }}" required
                                                        autocomplete="return_date" autofocus>
                                                    @error('return_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 
                                  
                                    
        
                                  
                                     {{-- equipmentId --}}
                                     <input type="hidden" value="{{$equipment->id}}" name="equipment_id">
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

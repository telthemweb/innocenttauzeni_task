@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 mt-lg-5 mb-lg-5">
                <div class="card">
                    @can('record equipments')
                    <div class="card-header bg-primary text-white">Equipments<button
                            class="btn btn-secondary float-right rounded-0" data-toggle="modal" data-target="#user-form-modal">
                            New Equipment <i class="fa fa-box"></i>
                        </button></div>
                        @endcan

                        
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Model</th>
                                                <th>Status</th>
                                                <th>Availability</th>
                                                <th>Assign</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                @foreach ($equipments as $equipment)
                                                  <tr>
                                                        <td>{{ $equipment->name }}</td>
                                                        <td>{{ $equipment->type }}</td>
                                                        <td>{{ $equipment->model }}</td>
                                                        
                                                        <td>
                                                            @if($equipment->status==1)
                                                            <b class="text-success">brand-new</b>
                                                            @else
                                                            <b class="text-danger">Old</b>
                                                            @endif
                                                        
                                                        </td>
                                                        <td>
                                                            @if($equipment->availability=="Available")
                                                            <b class="text-success">Available</b>
                                                            @else
                                                            <b class="text-danger">Not Available</b>
                                                            @endif
                                                        
                                                        </td>
                                                        <td>
                                                            @if($equipment->availability=="Available")
                                                            <a class="badge badge-success p-2" href="{{route('assign',$equipment->id)}}">Assign</a>
                                                            @else
                                                            <a class="badge badge-warning text-white p-2" href="{{route('assigments')}}">Track Equipment</a>
                                                            @endif
                                                            
                                                        </td>
                                                        <td>
                                                            @can(['edit equipment'])
                                                            <a class="" href="{{route('equipment.edit',$equipment->id)}}"><i
                                                                    class="fa fa-edit text-success"></i> </a>
                                                                    @endcan
                                                                    @can(['delete equipment'])
                                                                    <a class="" href="{{route('equipment.destroy',$equipment->id)}}"> <i
                                                                    class="fa fa-trash text-danger"></i> </a>
                                                                    @endcan
                                                        </td>
                                                       
                                                    </tr>
                                                @endforeach
                                           
                                            

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>


    <div class="modal fade" role="dialog" tabindex="-1" id="user-form-modal" width="980">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">CREATE EQUIPMENT</h5>
                    <button class="close text-white" data-dismiss="modal">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-1">
                        <form method="POST" action="{{route('equipment.add')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Equipment Name') }}</label>
                                        <div class="rounded">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Equipment Name" name="name" value="{{ old('name') }}" required
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Equipment Type') }}</label>
                                        <div class="rounded">
                                            <select class="form-control @error('type') is-invalid @enderror"
                                                name="type" id="type" required="required">
                                                <option value="" disabled selected>Select Equipment Type</option>
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
                                                placeholder="Model" name="model" value="{{ old('model') }}" required
                                                autocomplete="model" autofocus>
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
                                                <option value="" disabled selected>Select Equipment Status</option>
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
                                                <option value="" disabled selected>Select Equipment Availability</option>
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
@endsection

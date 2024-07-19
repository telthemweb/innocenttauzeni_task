@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 mt-lg-5 mb-lg-5">
                <div class="card">
                    @can('create user')
                    <div class="card-header bg-primary text-white">System Users <button
                            class="btn btn-secondary float-right rounded-0" data-toggle="modal" data-target="#user-form-modal">
                            New User <i class="fa fa-user-cog"></i>
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
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                @can('create user')
                                                <th>Roles</th>
                                                @endcan
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                @foreach ($users as $user)
                                                  <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->gender }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        @can('view roles')
                                               
                                                        <td>
                                                            @foreach ($user->roles as $role)
                                                                {{ $role->name }}
                                                            @endforeach
                                                        </td>
                                                        @endcan
                                                        <td>
                                                            @can(['edit user'])
                                                            <a class="" href="{{route('user.edit',$user->id)}}"><i
                                                                    class="fa fa-edit text-success"></i> </a>
                                                                    @endcan
                                                                    @can(['delete user'])
                                                                    <a class="" href="{{route('user.destroy',$user->id)}}"> <i
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
                    <h5 class="modal-title text-white">CREATE SYSTEM USER</h5>
                    <button class="close text-white" data-dismiss="modal">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-1">
                        <form method="POST" action="{{route('user.register')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Name') }}</label>
                                        <div class="rounded">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="First Name" name="name" value="{{ old('name') }}" required
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
                                                placeholder="Email Address" name="email" value="{{ old('email') }}"
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
                                                placeholder="Phone Number" value="{{ old('phone') }}" required
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
                                                <option value="" disabled selected>Select Gender</option>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>
                                        <div class="rounded">
                                            <input type="password" class="form-control pl-3" name="password"
                                                placeholder="Password" id="password" required>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Confirm') }}</label>
                                        <div class="rounded">
                                            <input type="password" class="form-control pl-3" name="password_confirmation"
                                                placeholder="Confirm Password" id="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Select Role') }}</label>
                                        <div class="rounded">
                                            <select class="form-control" name="role" id="role">
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">
                                        {{ __('Register') }}
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

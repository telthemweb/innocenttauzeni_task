@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-12 col-sm-12 col-md-12 mt-lg-2">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="#">
                    <div class="card p-4 shadow rounded bg-info ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <h4 class="text-white"><i
                                        class="fa fa-users mr-2"></i> </h4>
                                </div>
                                <div class="col-md-5">
                                    <b
                                        class="text-white badge badge-danger float-right mt-2">{{$users}}</b>
                                 </div>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="#">
                    <div class="card p-4 shadow rounded bg-success ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <h4 class="text-white"><i
                                        class="fa fa-box mr-2"></i></h4>
                                </div>
                                <div class="col-md-5">
                                    <b
                                        class="text-white badge badge-danger float-right mt-2">0</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="#">
                    <div class="card p-4 shadow rounded bg-info ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <h4 class="text-white"><i
                                        class="fa fa-box mr-2"></i> </h4>
                                </div>
                                <div class="col-md-5">
                                    <b
                                    class="text-white badge badge-danger float-right mt-2">0</b>
                                 </div>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

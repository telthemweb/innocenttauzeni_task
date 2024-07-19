@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 mt-lg-5 mb-lg-5">
                <div class="card">
                    <div class="card-header">Assigned Equipments </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Equipment Name</th>
                                                <th>Assigned Date</th>
                                                <th>Return Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @if(count($assignments)>0)
                                                @foreach ($assignments as $assignment)
                                                  <tr>
                                                        <td>{{ $assignment->user->name }}</td>
                                                        <td>{{ $assignment->equipment->name }}</td>
                                                        <td>{{ $assignment->date_assigned }}</td>
                                                        
                                                        <td>{{ $assignment->return_date }}</td>
                                                        
                                                       
                                                        <td>
                                                           
                                                                    @can(['unasign equipment'])
                                                                    <a class="badge badge-danger p-2" href="{{route('unassign.equipment',$assignment->id)}}">UnAssign Equipment </a>
                                                                    @endcan
                                                        </td>
                                                       
                                                    </tr>
                                                @endforeach
                                           @else
                                           <td colspan="5" class="text-center"><b class="text-danger">No Record yet</b></td>
                                           @endif
                                            

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


 
@endsection

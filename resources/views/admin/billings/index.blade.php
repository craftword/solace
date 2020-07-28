@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
@if ($message = Session::get('unsuccessfully'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
@endif
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Billings</li>
  </ol>
</nav>
    <h3 class="page-title">Patients Billings</h3>
    <div class="row">
        <div class="col-md-offset-9 col-xs-3">
<<<<<<< HEAD
             <a href="{{ URL::to('admin/outstandingBalance') }}">Outstanding Bills </a> 
=======
            <a href="{{ URL::to('admin/lastMonthly') }}">Last Month </a> |  <a href="{{ URL::to('admin/currentMonthly') }}">Current Month </a> 
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            
        </div>
    </div>
     <div class="panel panel-default">
        <div class="panel-heading">
            List

        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>Surname</th>
                        <th>Firstname</th>
                        <th>Email</th>
                        <th>Phone</th>
<<<<<<< HEAD
                        <th>Auth Code</th> 
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                        <th>&nbsp;</th> 
                        <th>&nbsp;</th>                        

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($patients) > 0)
                        @foreach ($patients as $patient)
                            <tr >
                                <td>{{ $patient->Surname }}</td>
                                <td>{{ $patient->Firstname }}</td>
                                <td>{{ $patient->Email }}</td>
                                <td>{{ $patient->PhoneNumber }}</td>
<<<<<<< HEAD
                                <td>{{ $patient->lastestBill->AuthCode }}</td>
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                <td><a href="{{ route('admin.billings.edit',[$patient->id]) }}">Add Bills </a></td>
                                <td><a href="{{ route('admin.billings.show',[$patient->id]) }}">View Bills </a></td>
                                
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
<<<<<<< HEAD

                   
                 
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                </tbody>
            </table>
        </div>
    </div>


 
@stop


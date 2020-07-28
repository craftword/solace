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
    <li class="breadcrumb-item active" aria-current="page">Waiting Patients</li>
  </ol>
</nav>
    <h3 class="page-title">Patients In Waiting</h3>
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
                        <th>Registration type</th>
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
                                @if($patient->RegistrationType == "HMO")
                                <td style="color:blue;">{{ $patient->RegistrationType }}</td>
                                @elseif($patient->RegistrationType == "ANC")
                                 <td style="color:red;">{{ $patient->RegistrationType }}</td>   
                                @else
                                <td style="color:green;">{{ $patient->RegistrationType }}</td>
                                @endif
                                @can('nurse_patients')
                                <td><a href="clinics/summary/{{ $patient->id }}">View Summary </a></td>
                                @endcan
                                @can('doctor_patients')
                                <td><a href="clinics/summary/{{ $patient->id }}">View Summary </a></td>
                                @endcan
=======
                                <td><a href="clinics/summary/{{ $patient->id }}">View Summary </a></td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                <td><a href="clinics/view/{{ $patient->id }}">View History </a></td>
                                
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop


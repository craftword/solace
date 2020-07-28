@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.patients.waiting_patients') }}">Waiting Patients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Histories</li>
  </ol>
</nav>
   <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>ID</th>
<<<<<<< HEAD
                        <th>View History</th> 
                        <th>Registration Type</th>                       
=======
                        <th>View History</th>                        
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                        <th>Time</th>
                        

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($histories) > 0)
                        @foreach ($histories as $history)
                            <tr data-entry-id="{{ $history->id }}">
                                <td></td>
                                <td>{{ $history->id }}</td>
                                @can('nurse_patients')
                                <td><a href="{{ URL::to('admin/clinics/nurse/'.$history->id) }}">View History </a></td>
                                @endcan
                                @can('doctor_patients')
                                <td><a href="{{ URL::to('admin/clinics/doctor/'.$history->id) }}">View History </a></td>
                                @endcan
                                @can('edit_pharmacy')
                                <td><a href="{{ URL::to('admin/clinics/pharmacy/'.$history->id) }}">View History </a></td>
                                @endcan
                                 @can('manage_lab')
                                <td><a href="{{ URL::to('admin/clinics/lab/'.$history->id) }}">View History </a></td>
                                @endcan
<<<<<<< HEAD
                                @if($history->HistoryPC == "HMO")
                                <td style="color:blue;">{{ $history->HistoryPC }}</td>
                                @elseif($history->HistoryPC == "ANC")
                                 <td style="color:red;">{{ $history->HistoryPC }}</td>   
                                @else
                                <td style="color:green;">PRIVATE</td>
                                @endif
                                
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                <td>{{date('jS F, Y',strtotime($history->created_at))}}</td>
                                

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

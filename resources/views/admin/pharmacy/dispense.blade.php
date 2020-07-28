@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dispense</li>
  </ol>
</nav>
    <h3 class="page-title">Dispensed Drug</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($drugs) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Drug Name</th>
                        <th>Patient Name</th>
                        <th>Quantity</th>
                        <th>Staff Name</th>
                        <th>Date </th>                    
                        

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($drugs) > 0)
                        @foreach ($drugs as $drug)
                            <tr data-entry-id="{{ $drug->id }}">
                                <td>
                                   
                                                                        
                                </td>
                                <td>{{ $drug->DrugName }}</td>
                                <td>{{ $drug->PatientName }}</td>
                                <td>{{ $drug->Quantity }}</td>
                                <td>{{ $drug->StaffName }}</td>
                                <td>{{ $drug->created_at }}</td>
                                
                                

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

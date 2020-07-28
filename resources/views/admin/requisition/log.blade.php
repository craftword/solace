@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.requisition.index')}}">Requisition</a></li>
    <li class="breadcrumb-item active" aria-current="page">logs</li>
  </ol>
</nav>

    <h3 class="page-title">Requisition</h3>   
    
  
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Logs Of Requisitions </h3>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($requisitions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>ItemName</th>
                        <th>QuantityNeeded</th>
                        <th>Purposes</th>
                        <th>Department</th>
                        <th>StaffName </th>
                        <th> Approved Quantity</th>
                        <th> Approved </th>
                        <th> Date </th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($requisitions) > 0)
                        @foreach ($requisitions as $requisition)
                            <tr data-entry-id="{{ $requisition->id }}">
                                <td></td>
                                <td>{{ $requisition->ItemName }}</td>
                                <td>{{ $requisition->QuantityNeeded }}</td>
                                <td>{{ $requisition->Purposes }}</td>
                                <td>{{ $requisition->Department }}</td>
                                <td>{{ $requisition->StaffName }}</td>
                                <td>
                                     {{ $requisition->QuantityApproved }}
                                </td>
                                <td>
                                @if($requisition->Approved == "Approved") 
                                      <span style="color:blue;"> {{ $requisition->Approved }} </span>
                                 @else 
                                        <span style="color:red;"> {{ $requisition->Approved }} </span>  
                                @endif  
                                </td>
                                <td>
                                     {{ $requisition->created_at }}
                                </td>
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






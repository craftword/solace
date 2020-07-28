@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
     <li class="breadcrumb-item"><a href="{{ route('admin.billings.index') }}">Billings</a></li>
     <li class="breadcrumb-item active" aria-current="page">Monthly Bill</li>
  </ol>
</nav>
    <h3 class="page-title"> Bills</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($months) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Patient Name</th>
                        <th>Drug Cost</th>
                        <th>Procedure Cost</th>
                        <th>Lab Cost</th>
                        <th>Total Cost</th>
                        <th>Deposit</th>
                        <th>Discount</th>
                        <th>Payment</th>
                        <th>Balance</th>
                        <th>Refund</th>
                        <th>Date</th>                        


                    </tr>
                </thead>
                
                <tbody>
                    @if (count($months) > 0)
                        @foreach($months as $month)
                         <tr data-entry-id="{{ $month->id }}">
                                <td></td><td>{{$month->Surname}}  {{ $month->Firstname}} </td> 
                                <td>{{$month->DrugCost }} </td><td>{{$month->ProcedureCost }} </td>
                                <td>{{$month->LabCost }} </td><td>{{$month->OverallCost  }} </td><td>{{$month->Deposit  }} </td>
                                <td>{{$month->Discount  }} </td><td>{{$month->Payment  }} </td>
                                <td>{{$month->Balance  }} </td> <td>{{$month->Refund  }} </td><td>{{date('jS F, Y',strtotime($month->created_at))}} </td>
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


@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
     <li class="breadcrumb-item active" aria-current="page">Family Account Deposit</li>
  </ol>
</nav>
    <h3 class="page-title"> Family Account Deposit </h3>
        
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($deposits) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Family name</th>
                        <th>Type</th>
                        <th>Activity </th>
                         <th>Amount </th>
                        <th>Date</th> 
                                             


                    </tr>
                </thead>
                
                <tbody>
                    @if (count($deposits) > 0)
                        @foreach($deposits as $deposit)
                         <tr data-entry-id="{{ $deposit->id }}">
                                <td> </td>
                                <td>{{$deposit->familyname}}  </td> 
                                <td>{{ $deposit->familytype}} </td>
                                <td>{{ $deposit->activity}} </td>
                                <td>{{ $deposit->amount}} </td>
                                <td>{{$deposit->created_at}} </td>                             
                               
                              
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








@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/humanresource') }}">Staff List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Termination Logs</li>
  </ol>
</nav>
    <h3 class="page-title">Termination Logs</h3>    
     <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($terminates) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Surname</th>
                        <th>Firstame</th>
                        <th>Last Day At Work</th>
                        <th>Last Day On Benefit</th>
                        <th>Release Date</th>
                        <th>Termination Type</th>
                        <th>Termination Reason </th>                       
                        <th>Severance Paid </th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($terminates) > 0)
                        @foreach ($terminates as $terminate)
                            <tr data-entry-id="{{ $terminate->id }}">
                                <td>

                                </td>
                                <td>{{ $terminate->SURNAME }}</td>
                                <td>{{ $terminate->FIRSTNAME }}</td>
                                <td>{{ $terminate->lastDayAtWork  }}</td>
                                <td>{{ $terminate->lastDayOnBenefit }}</td>
                                <td>{{ $terminate->releaseDate }}</td> 
                                <td>{{ $terminate->terminationType }}</td> 
                                <td>{{ $terminate->terminationReason }}</td>  
                                <td>{{ $terminate->severancePaid }}</td>                             

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



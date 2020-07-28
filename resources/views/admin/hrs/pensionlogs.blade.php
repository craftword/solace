@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/humanresource') }}">Staff List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pension Logs</li>
  </ol>
</nav>
    <h3 class="page-title">Pension Logs</h3>    
     <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($pensions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Surname</th>
                        <th>Firstame</th>
                        <th>Pension Manager</th>
                        <th>Amount</th>                       

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($pensions) > 0)
                        @foreach ($pensions as $pension)
                            <tr data-entry-id="{{ $pension->id }}">
                                <td>

                                </td>
                                <td>{{ $pension->SURNAME }}</td>
                                <td>{{ $pension->FIRSTNAME }}</td>
                                <td>{{ $pension->pensionManager  }}</td>
                                <td>{{ $pension->amount }}</td>
                                                           

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



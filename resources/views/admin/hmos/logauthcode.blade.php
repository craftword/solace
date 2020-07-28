@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{url('admin.hmo.authcode')}}">Authorization Code</a></li>
    <li class="breadcrumb-item active" aria-current="page">logs</li>
  </ol>
</nav>

    <h3 class="page-title">Authorization Log</h3>   
    
  
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Logs Of Authorization</h3>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($authcodes) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Name</th>
                        <th>Authorization Code</th>
                        <th>Authorization Duration</th>
                        <th>Authorizer Name</th>
                        <th>Report</th>
                        <th>Staff Name</th>
                        <th> Date </th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($authcodes) > 0)
                        @foreach ($authcodes as $authcode)
                            <tr data-entry-id="{{ $authcode->id }}">
                                <td></td>
                                <td>{{ $authcode->Surname}}  {{$authcode->Firstname }}</td>
                                <td>{{ $authcode->AuthCode}}</td>
                                <td>{{ $authcode->AuthDuration }}</td>
                                <td>{{ $authcode->AuthorizerName }}</td>
                                <td>{{ $authcode->Report }}</td>
                                <td>{{ $authcode->StaffName }}</td>
                                </td>
                            
                                <td>
                                     {{ $authcode->created_at }}
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






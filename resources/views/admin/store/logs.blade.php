@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/store') }}">Store</a></li>
    <li class="breadcrumb-item active" aria-current="page">Drug Logs</li>
  </ol>
</nav>
    <h3 class="page-title">Store</h3>
      <div class="panel panel-default">          
        <div class="panel-heading">
            Items List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($druglogs) > 0 ? 'datatable' : '' }} dt-select ">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Activity</th>
                        <th>Staff Name</th>
                        <th>Time </th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($druglogs) > 0)
                        @foreach ($druglogs as $druglog)
                                                  
                                <tr data-entry-id="{{ $druglog->id }}">
                                    <td><input type="checkbox"/> </td>
                                    <td>{{ $druglog->activity }}</td>
                                    <td>{{ $druglog->staffname }}</td>
                                    <td>{{ date('jS F, Y',strtotime($druglog->created_at))}}</td>                                

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
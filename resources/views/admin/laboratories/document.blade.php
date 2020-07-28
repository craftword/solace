@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Uploaded Files</li>
  </ol>
</nav>
    <h3 class="page-title">Uploaded Files</h3>     
    

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($labfiles) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                         <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>No. </th>
                        <th>Full Name</th>
                        <th>File Name</th>
                        <th>Show Document</th>                                              
                        

                    </tr>
                </thead>
                
                
                <tbody>
               
                    @if (count($labfiles) > 0)
                        @foreach ($labfiles as $labfile)
                            <tr data-entry-id="{{ $labfile->id }}">
                                <td></td>
                                <td>{{ $labfile->id }}</td>
                                <td>{{ $labfile->Surname }} - {{ $labfile->Firstname }}</td>
                                <td>{{ $labfile->Name }}</td>
                                <td><a href="{{asset($labfile->Url)}}"  target="_blank"> <i class="fa fa-download"></i> </a></td>
                                
                                
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


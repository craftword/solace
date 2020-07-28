@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a birthef="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Birth Records</li>
  </ol>
</nav>
    <h3 class="page-title">Birth Records</h3>    
       <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($births) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Surname</th>
                        <th>Firstname</th>
                        <th>MOD</th>                        
                        <th>APGAR</th>
                        <th>BW</th>
                        <th>Length </th> 
                        <th>PDN </th>                                           
                        <th>Complication</th>
                        <th>EBL</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($births) > 0)
                        @foreach ($births as $birth)
                            <tr data-entry-id="{{ $birth->id }}">
                                <td>

                                </td>
                                <td>{{ $birth->Surname }}</td>
                                <td>{{ $birth->Firstname }}</td>
                                <td>{{ strip_tags($birth->MOD ) }}</td>                                
                                <td>{{ strip_tags($birth->APGAR  ) }}</td>
                                <td>{{ strip_tags($birth->BW ) }}</td>
                                <td>{{ strip_tags($birth->Length ) }}</td>
                                <td>{{ strip_tags($birth->PDN ) }}</td>
                                <td>{{ strip_tags($birth->Complication ) }}</td>
                                <td>{{ strip_tags($birth->EBL ) }}</td>
                                                              
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
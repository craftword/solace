@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Account Receiveable </li>
  </ol>
</nav>
    <h3 class="page-title"> Account Receiveable </h3>
        
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($receives) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Full Name</th>                                            
                        <th>Balance</th>
                        <th>Date</th>                                  


                    </tr>
                </thead>
                
                <tbody>
                    @if (count($receives) > 0)
                         @php 
                            $total = 0;
                         @endphp
                        @foreach($receives as $receive)
                            @if($receive->RegistrationType != "HMO")                         
                            <tr data-entry-id="{{ $receive->id }}">
                                    <td></td>
                                    <td>{{$receive->Surname}}  {{ $receive->Firstname}} </td>                                 
                                    <td>{{$receive->Balance}} </td>                                 
                                    <td>{{$receive->created_at}} </td>
                                    @php 
                                            $total = $total + $receive->Balance;
                                    @endphp 
                            @endif                              
                        </tr>
                        @endforeach
                        <tr>
                            <td></td><td> <strong> Total </strong>:</td> <td style="color:red; font-size:25px;"><strong> {{$total}} </strong> </td><td> </td>
                        </tr>
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




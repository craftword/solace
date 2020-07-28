@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">HMO Account Receiveable </li>
  </ol>
</nav>
    <h3 class="page-title"> HMO Account Receiveable </h3>
        
    <div class="panel panel-default">
        <div class="panel-heading">
            HMO List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($hmos) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Full Name</th>
                        <th>Hmo Name</th>                                           
                        <th>Balance</th>
                        <th>Date</th>                                  


                    </tr>
                </thead>
                
                <tbody>
                    @if (count($hmos) > 0)
                         @php 
                            $total = 0;
                         @endphp
                        @foreach($hmos as $hmo)                         
                         <tr data-entry-id="{{ $hmo->id }}">
                                <td></td>
                                <td>{{$hmo->Surname}}  {{ $hmo->Firstname}} </td>
                                <td>{{$hmo->Hmo}} </td>                                 
                                <td>{{$hmo->Bill}} </td>                                 
                                <td>{{$hmo->created_at}} </td>
                                   @php 
                                        $total = $total + $hmo->Bill;
                                   @endphp                               
                        </tr>
                        @endforeach
                        <tr>
                            <td></td><td> </td> <td> <strong> Total </strong>:</td> <td style="color:red; font-size:25px;"><strong> {{$total}} </strong> </td><td> </td>
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




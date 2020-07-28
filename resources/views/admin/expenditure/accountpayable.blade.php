@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Account Payable </li>
  </ol>
</nav>
    <h3 class="page-title"> Account Payable </h3>
        
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($pays) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Item Name</th>                                            
                        <th>Balance</th>
                        <th>Date</th>                                  


                    </tr>
                </thead>
                
                <tbody>
                    @if (count($pays) > 0)
                        @php 
                            $total = 0;
                         @endphp 
                        @foreach($pays as $pay)
                                                   
                         <tr data-entry-id="{{ $pay->id }}">
                                <td></td>
                                <td>{{$pay->Itemname}} </td>                                 
                                <td>{{$pay->Balance}} </td>                                 
                                <td>{{$pay->created_at}} </td>
                                 @php 
                                    $total = $total + $pay->Balance;
                                @endphp 
                                                         
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




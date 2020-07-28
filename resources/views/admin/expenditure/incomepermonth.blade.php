@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('admin/allIncomes') }}">Income</a></li>
     <li class="breadcrumb-item active" aria-current="page">Income Per Month </li>
  </ol>
</nav>
    <h3 class="page-title"> Monthly Income</h3>
        
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($incomes) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Fullname</th>                                            
                        <th>Payment</th>
                        <th>Payment Type</th>
                        <th>Discount</th>
                        <th>Refund</th>
                        <th>Date</th>                                          


                    </tr>
                </thead>
                
                <tbody>
                    @if (count($incomes) > 0)
                         @php 
                            $total = 0;
                         @endphp
                        @foreach($incomes as $income)                         
                         <tr data-entry-id="{{ $income->id }}">
                                <td></td>
                                <td>{{$income->Surname}}  {{ $income->Firstname}} </td>                                 
                                <td>{{$income->Payment}} </td>  
                                <td>{{$income->PaymentType}} </td> 
                                <td>{{$income->Discount}} </td>
                                <td>{{$income->Refund}} </td>                            
                                <td>{{$income->updated_at}} </td>
                                   @php 
                                        if($income->Payment == 0) {
                                            $total = $total + $income->Deposit;
                                        } else {
                                            $total = $total + $income->Payment;
                                        }
                                        
                                   @endphp                               
                        </tr>
                        @endforeach
                        <tr>
                            <td></td><td> <strong> Total </strong>:</td> <td style="color:red; font-size:25px;" colspan="6"><strong> {{$total}} </strong> </td>
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




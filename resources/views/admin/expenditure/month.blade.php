@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
     <li class="breadcrumb-item"><a href="{{ route('admin.expenditure.index') }}">Expenditure</a></li>
     <li class="breadcrumb-item active" aria-current="page">Monthly Expenditure</li>
  </ol>
</nav>
    <h3 class="page-title"> Expenses</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($months) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Item Name</th>
                        <th>Vendor</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Total Cost</th>
                        <th>Mode Of Payment</th>
                        <th>Amount Paid</th>
                        <th>Balance</th>
                        <th>Date</th>                                      


                    </tr>
                </thead>
                
                <tbody>
                    @if (count($months) > 0)
                         @php 
                            $total = 0;
                         @endphp
                        @foreach($months as $month)
                         <tr data-entry-id="{{ $month->id }}">
                                <td></td>
                                <td>{{$month->Itemname}} </td> 
                                <td>{{$month->Vendor }} </td>
                                <td>{{$month->Quantity }} </td>
                                <td>{{$month->Cost }} </td>
                                <td>{{$month->Totalcost  }} </td>
                                <td>{{$month->ModeOfPayment  }} </td>
                                <td>{{$month->AmountPaid  }} </td>
                                <td>{{$month->Balance  }} </td>
                                <td>{{date('jS F, Y',strtotime($month->created_at))}} </td>

                                   @php 
                                        $total = $total + $month->AmountPaid;
                                   @endphp  
                        </tr>
                        @endforeach
                        <tr>
                            <td style="color:red; font-size:25px;" colspan="9"><strong>  Total: {{$total}}  </strong> </td><td> </td>
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


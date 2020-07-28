@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
     <li class="breadcrumb-item active" aria-current="page">Income </li>
  </ol>
</nav>
    <h3 class="page-title"> Income</h3>
    <div class="row">
        
        <div class="col-md-offset-9 col-xs-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monthlyIncome">
				 Monthly Income
			</button>
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($incomes) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Patient Name</th>
                        <th>Drug Cost</th>
                        <th>Procedure Cost</th>
                        <th>Lab Cost</th>
                        <th>Total Cost</th>
                        <th>Deposit</th>
                        <th>Discount</th>
                        <th>Payment</th>
                        <th>Payment Type</th>
                        <th>Balance</th>
                        <th>Refund</th>
                        <th>Date</th> 
                        <th>Registration Type</th>                       


                    </tr>
                </thead>
                
                <tbody>
                    @if (count($incomes) > 0)
                        @foreach($incomes as $income)
                         <tr data-entry-id="{{ $income->id }}">
                                <td></td><td>{{$income->Surname}}  {{ $income->Firstname}} </td> 
                                <td>{{$income->DrugCost }} </td><td>{{$income->ProcedureCost }} </td>
                                <td>{{$income->LabCost }} </td><td>{{$income->OverallCost  }} </td><td>{{$income->Deposit  }} </td>
                                <td>{{$income->Discount  }} </td><td>{{$income->Payment  }} </td> <td>{{$income->PaymentType  }} </td>
                                <td>{{$income->Balance  }} </td> <td>{{$income->Refund  }} </td><td>{{date('jS F, Y',strtotime($income->created_at))}} </td>
                                <td>
                                    @if($income->clinicHistory_id == 0)
                                        Unregistered
                                    @else 
                                        Registered
                                    @endif
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

 <!-- Monthly Expenditure Modal -->
<div class="modal fade" id="monthlyIncome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Monthly Income</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/allIncomesPerMonth']) !!}
		                    	<div class="row">
		                			 <div class="col-xs-4 form-group">
				                    {!! Form::label('Startdate', 'Start date*', ['class' => 'control-label']) !!}
				                     {!! Form::date('Startdate', old('Startdate'), ['class' => 'form-control']) !!}
				                   
				                </div>
                                <div class="col-xs-4 form-group">
				                    {!! Form::label('Enddate', 'End date*', ['class' => 'control-label']) !!}
				                     {!! Form::date('Enddate', old('Enddate'), ['class' => 'form-control']) !!}
				                   
				                </div>
				                </div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            					            	
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>
@stop




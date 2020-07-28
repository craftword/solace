@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.expenditure.index') }}">Expenditure</a></li>
    <li class="breadcrumb-item active" aria-current="page">Payment</li>
  </ol>
</nav>
    <h3 class="page-title">Payment Histories</h3>
    
    <div class="panel panel-default">
        
        <div class="panel-body">
		
            <div class="row">
                <div class="col-xs-2 form-group">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#payment">
						  Add New Payment
					</button>
				
			</div>
			<div class="panel panel-default">
        
            <div class="row">
                <div class="col-md-offset-3 col-xs-8">
                   <h1> {{$expenditure->Vendor}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-xs-10">
                    <div class="row table-responsive">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Mode Of Payment</th>
                                    <th>Amount Paid</th>
                                    <th>Balance</th>
                                    <th>Date of Payment </th> 
									 <th> </th>                                

                                </tr>
                            </thead>
                                @if (count($payments) > 0)
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td> </td>
                                            <td>{{$payment->ModeOfPayment}} </td>
                                            <td>{{$payment->AmountPaid}} </td>
                                            <td>{{$payment->Balance}} </td>
                                            <td>{{date('jS F, Y',strtotime($payment->created_at)) }}</td>
                                            <td>
												{!! Form::open(array(
													'style' => 'display: inline-block;',
													'method' => 'DELETE',
													'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
													'url' => ['admin/payment', $payment->id])) !!}
												{!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
												{!! Form::close() !!} 
											</td>
										</tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                                    </tr>
                                @endif
                            </table>
                        </div>            
                    
                </div>
            </div>
        </div>
        
    </div>

    <!-- Payment Modal -->
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Payment</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/expenditure/payment']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
						                    {!! Form::label('ModeOfPayment', 'Mode Of Payment*', ['class' => 'control-label']) !!}
						                    {!! Form::text('ModeOfPayment', old('ModeOfPayment'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
						                    <p class="help-block"></p>
						                    @if($errors->has('ModeOfPayment'))
						                        <p class="help-block">
						                            {{ $errors->first('ModeOfPayment') }}
						                        </p>
						                    @endif
						            </div>
                                    <div class="col-xs-12 form-group">
						                    {!! Form::label('AmountPaid', 'Amount Paid *', ['class' => 'control-label']) !!}
						                    {!! Form::text('AmountPaid', old('AmountPaid'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
						                    <p class="help-block"></p>
						                    @if($errors->has('AmountPaid'))
						                        <p class="help-block">
						                            {{ $errors->first('AmountPaid') }}
						                        </p>
						                    @endif
						            </div>
                                    
				                </div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            
						            	{!! Form::hidden('expenditure_id', $expenditure->id) !!}
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>

@stop


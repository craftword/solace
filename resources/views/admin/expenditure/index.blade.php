@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Expenditure</li>
  </ol>
</nav>
    <h3 class="page-title">Expenditure</h3>
    
    
    <div class="row">
        <div class="col-xs-3">
            <a href="{{ route('admin.expenditure.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        </div>
        <div class="col-md-offset-6 col-xs-3">
         @can('manage_accounts')
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monthlyExpenditure">
				 Monthly Expenditure
			</button>
        @endcan
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($expenditures) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th ></th>

                        <th>Item Name</th>
                        <th>Vendor</th>
                        <th>Quantity</th>
                        <th>Unit Cost</th>
                        <th>Total Cost </th>
                        <th>Staff Name </th>
                        <th>Date of Purchase </th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($expenditures) > 0)
                        @foreach ($expenditures as $expenditure)
                            <tr data-entry-id="{{ $expenditure->id }}">
                                <td>{{ $expenditure->id }}</td>
                                <td>{{ $expenditure->Itemname }}</td>
                                <td>{{ $expenditure->Vendor}}</td>
                                <td>{{ $expenditure->Quantity  }}</td>
                                <td>{{ $expenditure->Cost }}</td>
                                <td>{{ $expenditure->Totalcost }}</td>
                                <td>{{ $expenditure->Staffname }}</td>
                                <td>{{date('jS F, Y',strtotime($expenditure->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('admin.expenditure.show',[$expenditure->id]) }}" class="btn btn-xs btn-success">Payment </a>
                                    <a href="{{ route('admin.expenditure.edit',[$expenditure->id]) }}" class="btn btn-xs btn-primary">Edit </a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.expenditure.destroy', $expenditure->id])) !!}
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
                </tbody>
            </table>
        </div>
    </div>
 <!-- Monthly Expenditure Modal -->
<div class="modal fade" id="monthlyExpenditure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Monthly Expenditure</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/expenditure/monthly']) !!}
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

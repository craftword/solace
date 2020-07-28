@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Requisition</li>
  </ol>
</nav>
@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
			</div>
	@endif

    <h3 class="page-title">Requisition</h3>
    <p>
        @can('manage_requisition')
        <a href="{{ url('admin/logApproval') }}" class="btn btn-warning"> Requisitions Logs</a>
        @endcan 
        
    </p>
      
    <div class="panel panel-default">
        <div class="panel-heading">
            Add New Requisition
        </div>

        <div class="panel-body table-responsive">
        {!! Form::open(['method' => 'POST', 'route' => ['admin.requisition.store']]) !!}
		              <div class="row">
                          <div class="col-xs-6 form-group">
                            {!! Form::label('ItemName', 'ItemName *', ['class' => 'control-label']) !!}
                            {!! Form::text('ItemName', old('ItemName'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('ItemName'))
                                <p class="help-block">
                                    {{ $errors->first('ItemName') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-xs-6 form-group">
                            {!! Form::label('QuantityNeeded', '	QuantityNeeded *', ['class' => 'control-label']) !!}
                            {!! Form::text('QuantityNeeded', old('QuantityNeeded'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('QuantityNeeded'))
                                <p class="help-block">
                                    {{ $errors->first('QuantityNeeded') }}
                                </p>
                            @endif
                        </div>
		                			<div class="col-xs-8 form-group">
						                    {!! Form::label('Purposes', '	Purposes*', ['class' => 'control-label']) !!}
                                {!! Form::textarea('Purposes', old('Purposes'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
						                  
						                    <p class="help-block"></p>
						                    @if($errors->has('Purposes'))
						                        <p class="help-block">
						                            {{ $errors->first('Purposes') }}
						                        </p>
						                    @endif
						                </div>
                            <div class="col-xs-4 form-group">
                              {!! Form::label('Department', 'Department *', ['class' => 'control-label']) !!}
                              {!! Form::select('Department', [ 'Store' => 'Store', 'Admin'=> 'Admin', 'Doctor'=>'Doctor', 'Nurse'=>'Nurse', 'Pharmacy' =>'Pharmacy', 'Front Desk Officer'=>'Front Desk Officer', 'Billing'=> 'Billing', 'Facility Manager'=>'Facility Manager','Account Officer'=>'Account Officer','Cashier'=>'Cashier','Cleaner'=>'Cleaner','Security'=>'Security','Laboratory Technician'=>'Laboratory Technician','Theatre'=> 'Theatre', 'Labour Room'=> 'Labour Room', 'A & E'=> 'A & E'], null, ['class' => 'form-control',]); !!}
                              <p class="help-block"></p>
                              @if($errors->has('Department'))
                                  <p class="help-block">
                                      {{ $errors->first('Department') }}
                                  </p>
                              @endif
                          </div>
				                </div>
				                <div class="row">		                	
							        <div class="col-md-offset-11 col-xs-1 form-group">
								          	{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							         					            	
                                               
					{!! Form::close() !!}
				            </div>
            
        </div>
    </div>

    @can('manage_store')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>List Of Requistions </h3>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($requisitions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>ItemName</th>
                        <th>QuantityNeeded</th>
                        <th>Purposes</th>
                        <th>Department</th>
                        <th>StaffName </th>
                        <th> Approved Quantity</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($requisitions) > 0)
                        @foreach ($requisitions as $requisition)
                           @if($requisition->Status == "Active") 
                            <tr data-entry-id="{{ $requisition->id }}">
                                <td></td>
                                <td>{{ $requisition->ItemName }}</td>
                                <td>{{ $requisition->QuantityNeeded }}</td>
                                <td>{{ $requisition->Purposes }}</td>
                                <td>{{ $requisition->Department }}</td>
                                <td>{{ $requisition->StaffName }}</td>
                                <td>
                                 @if($requisition->QuantityApproved < 0) 
                                   <button  class="btn btn-info" id="{{ $requisition->id }}" >Add Approved Quantity</button> 
                               
                                @else 
                                     {{ $requisition->QuantityApproved }} 
                                @endif
                                </td>
                            </tr>
                            @endif
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
    @endcan

    @can('doctor_patients')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>List Of Requistions </h3>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($requisitions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>ItemName</th>
                        <th>QuantityNeeded</th>
                        <th>Purposes</th>
                        <th>Department</th>
                        <th>StaffName </th>
                        <th> Approved Quantity</th>
		                  	<th> Aprov </th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($requisitions) > 0)
                        @foreach ($requisitions as $requisition)
			                       @if($requisition->QuantityApproved != 0 && $requisition->Status == "Active" ) 
                            <tr data-entry-id="{{ $requisition->id }}">
                                <td></td>
                                <td>{{ $requisition->ItemName }}</td>
                                <td>{{ $requisition->QuantityNeeded }}</td>
                                <td>{{ $requisition->Purposes }}</td>
                                <td>{{ $requisition->Department }}</td>
                                <td>{{ $requisition->StaffName }}</td>
                                <td>                     
                                                              
                                     {{ $requisition->QuantityApproved }} 
                                
                                </td>

                                <td> 
                                  <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary user_dialog" data-toggle="modal" data-target="#exampleModal" data-id="{{ $requisition->id }}">
                                  Add Approval
                                </button>
                                </td>
                            </tr>
			    @endif
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
    @endcan
   
    @can('manage_accounts')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>List Of Requistions </h3>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($requisitions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>ItemName</th>
                        <th>QuantityNeeded</th>
                        <th>Purposes</th>
                        <th>Department</th>
                        <th>StaffName </th>
                        <th> Approved Quantity</th>
		                <th> Aproved </th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($requisitions) > 0)
                        @foreach ($requisitions as $requisition)
			                       @if($requisition->Approved == "Approved" ) 
                            <tr data-entry-id="{{ $requisition->id }}">
                                <td></td>
                                <td>{{ $requisition->ItemName }}</td>
                                <td>{{ $requisition->QuantityNeeded }}</td>
                                <td>{{ $requisition->Purposes }}</td>
                                <td>{{ $requisition->Department }}</td>
                                <td>{{ $requisition->StaffName }}</td>
                                <td>                     
                                                              
                                     {{ $requisition->QuantityApproved }} 
                                
                                </td>

                                <td>                     
                                                              
                                    {{ $requisition->Approved }} 
                                                         
                                </td>
                         
                                
                            </tr>
			                     @endif
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
    @endcan



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Approval</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/updateApproval']) !!}
                    		<div class="row">
                        <div class="col-xs-6 form-group">
                            {!! Form::label('Approved', 'Approved *', ['class' => 'control-label']) !!}
                            {!! Form::select('Approved', ['Approved'=>'Approved', 'Disapproved'=>'Disapproved'], null, ['class' => 'form-control',]); !!}
                            <p class="help-block"></p>
                            @if($errors->has('Approved'))
                                <p class="help-block">
                                    {{ $errors->first('Approved') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-xs-6 form-group">
                            {!! Form::label('QuantityNeeded', '	QuantityNeeded *', ['class' => 'control-label']) !!}
                            {!! Form::text('QuantityNeeded', old('QuantityNeeded'), ['class' => 'form-control']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('QuantityNeeded'))
                                <p class="help-block">
                                    {{ $errors->first('QuantityNeeded') }}
                                </p>
                            @endif
                        </div>

                        </div>
				                <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('ReasonForDisapproval', 'Reason For Disapproval *', ['class' => 'control-label']) !!}
                            {!! Form::text('ReasonForDisapproval', old('ReasonForDisapproval'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('ReasonForDisapproval'))
                                <p class="help-block">
                                    {{ $errors->first('ReasonForDisapproval') }}
                                </p>
                            @endif
                        </div>

                        </div>			                
				                <div class="row">
					                <div class="col-md-offset-10 col-xs-2 form-group">
					                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
					                </div>
					            </div>
                      <input type="hidden" name="reqId" id="reqId" value=""/>
				                {!! Form::close() !!}

				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>

@stop


@section('javascript') 
  <script>
    var env = window.location.host;
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }

    $('.btn-info').on('click', function(){
      const qty = Number(prompt("Enter quantity to be approved"));
      $.ajax({
            data: {  
                    id: $(this).attr('id'),                  
                    quantity:qty,                   
                     _token: '{!! csrf_token() !!}'
                    
                },
            url: baseurl + '/admin/updateQuantity',
            method: 'PUT',
            dataType: 'json',
            success:function(data) {
                console.log(data);
                location.reload(); 
            }
           });    
    });

    $(document).on("click", ".user_dialog", function () {
     var reqId = $(this).data('id');
     $(".modal-body #reqId").val( reqId );
});
  </script>
@endsection



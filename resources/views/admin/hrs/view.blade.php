@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.humanresource.index') }}">Staff List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Staff Profile</li>
  </ol>
</nav>
<p>
	<a href="#" class="btn btn-success" data-toggle="modal" data-target="#leave">Leave </a> 
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pension">Pension </a>
    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#terminate">Terminate </a>  
		<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#document">Documents </a> 
</p>
<div class="panel panel-default">
    <div class="panel-heading">
        Staff Profile
    </div>
	<div class="row">                			
    	<div class="col-md-offset-3 col-xs-7">
        	<h1>{{ $hrs->SURNAME }}
		    	{{ $hrs->FIRSTNAME }}
		        {{ $hrs->OTHERNAME }}</h1>
								
		</div> 
	</div>
    <div class="row">
        <div class="col-md-offset-1 col-xs-10">
         
		    <div class="row table-responsive">
		        <table class="table table-bordered">
		            <tr>
		                <td><strong>Sex</strong></td><td>{{ $hrs->SEX }}</td> <td><strong>Date of Birth</strong></td><td>{{ $hrs->DATEOFBIRTH}}</td> <td><strong> Picture </strong></td>
		            </tr>
		            <tr>
		            	<td><strong>Email</strong></td><td>{{ $hrs->EMAIL }}</td> <td><strong>MARITAL STATUS</strong></td><td>{{ $hrs->MARITALSTATUS}}</td><td rowspan="5" align="centre"> <img class="img-response" src="@if($hrs->PHOTOGRAPH == null){{URL::to('/')}}/images/default.PNG @else {{URL::to('/')}}/{{$hrs->PHOTOGRAPH}} @endif" alt="" /> <br />
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pic">
						  Edit Picture
						</button></td>
		            </tr>
		            <tr>
		                <td><strong>PERMANENT HOME ADDRESS</strong></td><td>{{ $hrs->PERMANENTHOMEADDRESS }}</td><td><strong>PRESENT RESIDENTIAL ADDRESS</strong></td><td>{{ $hrs->PRESENTRESIDENTIALADDRESS}}</td>
		            </tr>
		            <tr>
		                <td><strong>JOB DESCRIPTION</strong></td><td>{{ $hrs->JOBDESCRIPTION }}</td> <td><strong>PHONE NUMMBERS</strong></td><td>{{ $hrs->PHONENUMMBERS}}</td>
		            </tr>
		            <tr>
		                <td><strong>STATE OF ORIGIN </strong></td><td>{{ $hrs->STATEOFORIGIN }}</td> <td><strong>	POSITION IN THE ORGANISATION</strong></td><td>{{ $hrs->POSITIONINTHEORGANISATION}}</td>
					</tr>
					<tr>
						<td><strong>QUALIFICATIONS</strong></td><td>{{ $hrs->QUALIFICATIONS}}</td><td><strong>DATE OF EMPLOYMENT</strong></td><td>{{ $hrs->DATEOFEMPLOYMENT}}</td>
		            </tr>
                    <tr>
						<td><strong>NAME OF NEXT OF KIN</strong></td><td>{{ $hrs->NAMEOFNEXTOFKIN}}</td><td><strong>ADDRESS OF NEXT OF KIN</strong></td><td>{{ $hrs->ADDRESSOFNEXTOFKIN}}</td><td><strong>DATE OF PROMOTION</strong></td><td>{{ $hrs->DATEOFPROMOTIONS}}</td>
		            </tr>
                    <tr>
						<td><strong>DATE OF INTERVIEW</strong></td><td>{{ $hrs->DATEOFINTERVIEW}}</td><td><strong>INTERVIEW CONDUCTED BY</strong></td><td>{{ $hrs->INTERVIEWCONDUCTEDBY}}</td><td><strong>ORIENTATION PERIOD</strong></td><td>{{ $hrs->ORIENTATIONPERIOD}}</td>
		            </tr>
                    <tr>
						<td><strong>ORIENTATION CONDUCTED BY</strong></td><td>{{ $hrs->ORIENTATIONCONDUCTEDBY}}</td><td><strong>STARTINGSALARY</strong></td><td>{{ $hrs->STARTINGSALARY}}</td><td><strong>SALARY INCREASE</strong></td><td>{{ $hrs->SALARYINCREASE}}</td><td><strong>DATE OF SALARY INCREASE</strong></td><td>{{ $hrs->DATEOFSALARYINCREASE}}</td>
		            </tr>
                    <tr>
						<td><strong>DATE OF SALARY INCREASE</strong></td><td>{{ $hrs->DATEOFSALARYINCREASE}}</td><td><strong>SALARY DEDUCTION</strong></td><td>{{ $hrs->SALARYDEDUCTION}}</td><td><strong>SALARY ADVANCE</strong></td><td>{{ $hrs->SALARYADVANCE}}</td><td><strong>TAX</strong></td><td>{{ $hrs->TAX}}</td>
		            </tr>
                    <tr>
						<td><strong>SALARY ADVANCE DURATION</strong></td><td>{{ $hrs->SALARYADVANCEDURATION}}</td><td><strong>EMPLOYMENT STATUS</strong></td><td>{{ $hrs->EMPLOYMENTSTATUS}}</td><td><strong>WORK HOUR</strong></td><td>{{ $hrs->WORKHOUR}}</td><td><strong>TAX ID</strong></td><td>{{ $hrs->TAXID}}</td>
		            </tr>
					<tr>
						<td><strong>BANK NAME </strong></td><td>{{ $hrs->BANKNAME }}</td><td><strong>ACCOUNT NAME</strong></td><td>{{ $hrs->ACCOUNTNAME}}</td><td><strong>ACCOUNT NUMBER</strong></td><td>{{ $hrs->ACCOUNTNUMBER}}</td>
		            </tr>
					
		        </table>
		    </div>
        </div>
	</div>
<div class="row">                			
    	<div class="col-md-offset-3 col-xs-7">
        	<h2>My Documents </h2>
					@if (count($files) > 0) 
						<div class="row table-responsive">
		                	<table class="table table-bordered">
								  			      <thead>
			                    				<tr>
				                    				<th>View</th>
							                       <th>Time</th>						                        
							                    </tr>
					                    	</thead>
						               <tbody>
						                    	@foreach ($files as $file)
																		<tr>
																		<td><strong><a href="{{asset($file->Url)}}"  target="_blank"> {{$file->Name}} </a></strong></td>
																		<td>{{$file->created_at}}</td>
																		</tr>
												         @endforeach
						             </tbody>
								  		</table>
								  		
								  	</div>


					@endif 			
		</div> 
	</div>

</div>











<!-- Picture Modal -->
<div class="modal fade" id="pic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Picture</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/uploadPic', 'enctype' => 'multipart/form-data']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
						                 {!! Form::file('image', array('class' => 'form-control')) !!}   						                    
						            </div>
				                </div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            {!! Form::hidden('id', $hrs->id) !!}						            	
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>

<!-- Leave Modal -->
<div class="modal fade" id="leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Add New Leave</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/leave', 'enctype' => 'multipart/form-data']) !!}
		                    	<div class="row">
		                			<div class="col-xs-4 form-group">
										{!! Form::label('startDate', 'Start date*', ['class' => 'control-label']) !!}
										{!! Form::date('startDate', old('startDate'), ['class' => 'form-control']) !!}
									
				               		 </div>
									<div class="col-xs-4 form-group">
										{!! Form::label('expectedReturnDate', 'Expected Return Date*', ['class' => 'control-label']) !!}
										{!! Form::date('expectedReturnDate', old('expectedReturnDate'), ['class' => 'form-control']) !!}
									
				               		 </div>
								   <div class="col-xs-4 form-group">
										{!! Form::label('actualReturnDate', 'Actual Return Date*', ['class' => 'control-label']) !!}
										{!! Form::date('actualReturnDate', old('actualReturnDate'), ['class' => 'form-control']) !!}									
				               		</div>
				                </div>
								<div class="row">
									<div class="col-xs-4 form-group">
										{!! Form::label('leaveDetails', 'Leave Details*', ['class' => 'control-label']) !!}
										{!! Form::select('leaveDetails', ['Maternity' => 'Maternity', 'Sick' => 'Sick', 'Study'=>'Study', 'Emergency'=>'Emergency', 'Leave of Absence'=>'Leave of Absence'], null, ['class' => 'form-control']); !!}
									
									</div>
									<div class="col-xs-4 form-group">
										{!! Form::label('reason', 'Reason*', ['class' => 'control-label']) !!}
										{!! Form::textarea('reason', old('reason'), ['class' => 'form-control']) !!}
									
									</div>
									<div class="col-xs-4 form-group">
										{!! Form::label('paidLeave', 'Paid Leave*', ['class' => 'control-label']) !!}
										{!! Form::select('paidLeave', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']); !!}
									
									</div>
								</div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            {!! Form::hidden('staffId', $hrs->id) !!}						            	
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>

<!-- Termination Modal -->
<div class="modal fade" id="terminate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Add Terminate</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/terminate', 'enctype' => 'multipart/form-data']) !!}
		                    	<div class="row">
		                			<div class="col-xs-4 form-group">
										{!! Form::label('lastDayAtWork', 'Last Day At Work*', ['class' => 'control-label']) !!}
										{!! Form::date('lastDayAtWork', old('lastDayAtWork'), ['class' => 'form-control']) !!}
									
				               		 </div>
									<div class="col-xs-4 form-group">
										{!! Form::label('lastDayOnBenefit', 'Last Day On Benefit*', ['class' => 'control-label']) !!}
										{!! Form::date('lastDayOnBenefit', old('lastDayOnBenefit'), ['class' => 'form-control']) !!}
									
				               		 </div>
								   <div class="col-xs-4 form-group">
										{!! Form::label('releaseDate', 'Release Date*', ['class' => 'control-label']) !!}
										{!! Form::date('releaseDate', old('releaseDate'), ['class' => 'form-control']) !!}									
				               		</div>
				                </div>
								<div class="row">
									<div class="col-xs-4 form-group">
										{!! Form::label('TerminationType', 'Termination Type*', ['class' => 'control-label']) !!}
										{!! Form::select('terminationType', ['Resignation' => 'Resignation', 'Dismissal' => 'Dismissal', 'Summary Dismissal'=>'Summary Dismissal', 'Incapacitation'=>'Incapacitation', 'Death'=> 'Death', 'Laid Off'=>'Laid Off'], null, ['class' => 'form-control']); !!}
									
									</div>
									<div class="col-xs-4 form-group">
										{!! Form::label('terminationReason', 'Termination Reason*', ['class' => 'control-label']) !!}
										{!! Form::textarea('terminationReason', old('terminationReason'), ['class' => 'form-control']) !!}
									
									</div>
									<div class="col-xs-4 form-group">
										{!! Form::label('severancePaid', 'Severance Paid*', ['class' => 'control-label']) !!}
										{!! Form::select('severancePaid', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']); !!}
									
									</div>
								</div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            {!! Form::hidden('staffId', $hrs->id) !!}						            	
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>
<!-- Pension Modal -->
<div class="modal fade" id="pension" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Add Pension</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/pension', 'enctype' => 'multipart/form-data']) !!}
		                    	
								<div class="row">
									<div class="col-xs-6 form-group">
										{!! Form::label('pensionManager', 'Pension Manager*', ['class' => 'control-label']) !!}
										{!! Form::text('pensionManager', old('pensionManager'), ['class' => 'form-control']) !!}
									
									</div>
									<div class="col-xs-6 form-group">
										{!! Form::label('amount', 'Amount *', ['class' => 'control-label']) !!}
										{!! Form::text('amount', old('amount'), ['class' => 'form-control']) !!}
									
									</div>
									
								</div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            {!! Form::hidden('staffId', $hrs->id) !!}						            	
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>
<!-- Staff Document Modal -->
<div class="modal fade" id="document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Add New Document</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/staffdocument', 'enctype' => 'multipart/form-data']) !!}
		                    	
								<div class="row">
									<div class="col-md-offset-1 col-md-3">
									{!! Form::text('Name', old('Name'), ['class' => 'form-control', 'placeholder' => 'Enter the Name of the file', 'required' => '']) !!}
											<p class="help-block"></p>
											@if($errors->has('Name'))
													<p class="help-block">
															{{ $errors->first('Name') }}
													</p>
											@endif
									
								</div>
								<div class="col-md-offset-1 col-md-4">

									{!! Form::file('image', array('class' => 'image')) !!}
									
								</div>
							</div>
				      <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            {!! Form::hidden('staffId', $hrs->id) !!}						            	
						              {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>
@stop





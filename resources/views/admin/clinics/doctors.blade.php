@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.patients.waiting_patients') }}">Waiting Patients</a></li>
    <li class="breadcrumb-item"><a href="{{ url('admin/clinics/view/'.$biodata->id) }}">Histories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Doctor Section</li>
  </ol>
</nav>
<<<<<<< HEAD
 
=======
 <h3 class="page-title">Patient Clinical Histories (Doctors Section)</h3>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	 @if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
			</div>
	@endif
<<<<<<< HEAD

	<div class="row">
	  <div class="col-xs-4">
         <h3 class="page-title">Patient Clinical Histories</h3>
	  </div>
	   <div class="col-xs-2">
	   		@if($billing == null || count($billing)== 0) 
				  	
				  @else
				  		@if($billing->Balance > 0)
						  <blockquote>
						  	Remaining Balance: {{$billing->Balance}} 
						  </blockquote>
						 @endif
				  @endif
	   </div>
		<div class="col-xs-4">
			@if ($admin == null) 
			 <h5 style="color:red;"><strong> Admission Button</strong></h5>							            
				<label class="switch">
                 <input type="checkbox" name="" id='status' value="checked" >
                	<span class="slider round"></span>
                     <input type="hidden" value="{{ $history->id }}" class="id" />									
                 </label>							
				   @else 
					  <h5 style="color:red;"><strong>Patient is On Admission</strong> </h5>
				   @endif	
		</div>
		<div class="col-xs-2">
	   		@if($allergies == null || count($allergies)== 0) 
				
		    @else
				<h4 style="color:red;"> Allergy Alert !!!!</h4>	
		   @endif
	   </div>
	</div>
@if (count($vitalsigns) > 0)
	<div class="row">
		<div class=" col-xs-6">
		     <div class="panel panel-primary">
			    <div class="panel-heading">
                     Temperature and Respiratory Rate Graph 
				</div>
					<div class="panel-body">
					     <div id="vitalsigns1"> </div>
						 
					</div>
					<p> </p>
					Temperature: <button class="btn btn-danger"> </button> | Respiratory Rate: <button class="btn btn-success"> </button>
				</div>
			</div>
		<div class=" col-xs-6">
		     <div class="panel panel-primary">
			    <div class="panel-heading">
                     Pulse rate and Oxygen Saturation Graph 
				</div>
					<div class="panel-body">
					     <div id="vitalsigns2"> </div>
						 
					</div>
					<p> </p>
					</button> Pulse Rate: <button class="btn btn-primary"> </button> |Oxygen Saturation: <button class="btn btn-warning"> </button>
				</div>
			</div>
	</div>
	
	   @endif
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
		 <!-- /.success pane -->
         <!-- START CUSTOM TABS -->
        <div class="row">
            <div class="col-md-12">            	
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Patients Profile</a></li>
<<<<<<< HEAD
                  <li><a href="#tab_2" data-toggle="tab">Vital Signs</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Clinical History</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Examination</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Prescription</a></li>                  
                  <li><a href="#tab_6" data-toggle="tab">Procedure</a></li>
                  <li><a href="#tab_7" data-toggle="tab">Lab Test</a></li>
                  <li><a href="#tab_8" data-toggle="tab">Management</a></li>
                  <li><a href="#tab_9" data-toggle="tab">Diagnosis</a></li>
									<li><a href="#tab_10" data-toggle="tab">Nurse Report</a></li>
									<li><a href="#tab_11" data-toggle="tab">Allergies</a></li>                     
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">				  
                  	 @if (count($biodata) > 0)
                  	 	<div class="row">                			
                			<div class="col-md-offset-3 col-xs-7">
=======
                  <li><a href="#tab_2" data-toggle="tab">Clinical History</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Vital Signs</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Examination</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Prescription</a></li>                  
                  <li><a href="#tab_6" data-toggle="tab">Nurse Report</a></li>
                  <li><a href="#tab_7" data-toggle="tab">Procedure</a></li>
                  <li><a href="#tab_8" data-toggle="tab">Lab Test</a></li>
                  <li><a href="#tab_9" data-toggle="tab">Management</a></li>
				  <li><a href="#tab_10" data-toggle="tab">Diagnosis</a></li>                    
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                  	 @if (count($biodata) > 0)
                  	 	<div class="row">                			
                			<div class="col-md-offset-3 col-xs-8">
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                        		<h1>{{ $biodata->Surname }}
		                        {{ $biodata->Firstname }}
		                        {{ $biodata->Middlename }}</h1>
								<input type="hidden" id="id" value="{{ $biodata->id}}" />
<<<<<<< HEAD
		                     </div>
=======
		                     </div> 
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                        	
                    	</div>
                    	<div class="row">
                			<div class="col-md-offset-1 col-xs-10">
		                    	<div class="row table-responsive">
		                    		<table class="table table-bordered">
		                    			<tr>
		                    				<td><strong>Sex</strong></td><td>{{ $biodata->Sex }}</td> <td><strong>Date of Birth</strong></td><td>{{ $biodata->Birthdate}}</td><td><strong>Phone Number</strong></td><td>{{ $biodata->PhoneNumber}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td><strong>Email</strong></td><td>{{ $biodata->Email }}</td> <td><strong>Religion</strong></td><td>{{ $biodata->Religion}}</td><td><strong>Occupation</strong></td><td>{{ $biodata->Occupation}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td><strong>Address</strong></td><td>{{ $biodata->Address }}</td>
		                    			</tr>
		                    			<tr>
<<<<<<< HEAD
		                    				<td><strong>State Of Origin</strong></td><td>{{ $biodata->StateOfOrigin }}</td> <td><strong>Marital Status</strong></td><td>{{ $biodata->Nationality}}</td><td><strong>Registration Type</strong></td><td>{{ $biodata->RegistrationType}}<input type="hidden" id="hmo" value="{{ $biodata->RegistrationType}}" /></td>
=======
		                    				<td><strong>State Of Origin</strong></td><td>{{ $biodata->StateOfOrigin }}</td> <td><strong>Nationality</strong></td><td>{{ $biodata->Nationality}}</td><td><strong>Registration Type</strong></td><td>{{ $biodata->RegistrationType}}<input type="hidden" id="hmo" value="{{ $biodata->RegistrationType}}" /></td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
		                    			</tr>
		                    			<tr>
		                    				<td><strong>Next Of Kin </strong></td><td>{{ $biodata->NextOfKin }}</td> <td><strong>Next Of Kin Phone</strong></td><td>{{ $biodata->NextOfKinPhone}}</td><td><strong>Next Of Kin Address</strong></td><td>{{ $biodata->NextOfKinAddress}}</td>
		                    			</tr>
		                    		</table>
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">
	                  		<div class="col-xs-2">            
								<a href="{{ URL::to('admin/surgeries/index/'.$history->id) }}" class="btn btn-primary" >
								Surgery Section
								</a>
							</div>
<<<<<<< HEAD
							@if($biodata->Sex == 'Female' & $biodata->age > 12 & $biodata->RegistrationType == 'ANC' )
=======
							@if($biodata->Sex == 'Female' & $biodata->age > 12 )
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
							<div class="col-xs-2">	                  
								<a href="{{ URL::to('admin/antenatal/index/'.$history->id) }}" class="btn btn-primary" >
								Ante Natal Section
								</a>
							</div>
							    
							<div class="col-xs-2">	                  
								<a href="{{ URL::to('admin/labour/index/'.$history->id) }}" class="btn btn-primary" >
								Labour Section
								</a>
							</div> 
							@endif           	
						</div>	                          
                        
                    @else
                    	<strong>No Records found</strong>
                     @endif
                    
                  </div><!-- / Profile .tab-pane -->
                  <div class="tab-pane" id="tab_2">                  	
<<<<<<< HEAD
=======
                    @if ($history->PresentingComplaint != '')
                    		<div class="row">
                    			<div class="col-xs-4">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>Presenting Complaint:</strong></p>
								  		{{ $history->PresentingComplaint }}
								  	</div>
								  </div>
								</div>
							  	<div class="col-xs-4">
								  <div class="panel panel-success">
								  	<div class="panel-body">
								  		<p><strong>History PC :</strong></p>
								  			{{ $history->HistoryPC }} 
								  	</div>
								  </div>
								</div>
								<div class="col-xs-4">
								  <div class="panel panel-danger">
								  	<div class="panel-body">
								  		<p><strong>	Family History:</strong></p>
								  			{{$history->FamilyHistory }}
								  	</div>
								  </div>
								</div>
							</div>
							<div class="row">
                    			<div class="col-xs-4">
								  <div class="panel panel-info">
								  	<div class="panel-body">
								  		<p><strong>Social History :</strong></p>
								  		{{ $history->SocialHistory }} 
								  	</div>
								  </div>
								</div>
							  	<div class="col-xs-4">
								  <div class="panel panel-default">
								  	<div class="panel-body">
								  		<p><strong>Past Medical History:</strong></p>
								  		{{ $history->PastMedicalHistory}}
								  	</div>
								  </div>
								</div>
								<div class="col-xs-4">
								  <div class="panel panel-warning">
								  	<div class="panel-body">
								  		<p><strong>Past Surgical History:</strong></p>
								  		{{$history->PastSurgicalHistory}}
								  	</div>
								  </div>
								</div>
							</div>
							<div class="row">
                    			<div class="col-xs-4">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>Drug History :</strong></p>
								  		{{$history->DrugHistory}} 
								  	</div>
								  </div>
								</div>
							  	<div class="col-xs-4">
								  <div class="panel panel-success">
								  	<div class="panel-body">
								  		<p><strong>Allergy History:</strong></p>
								  		{{$history->AllergyHistory}}
								  	</div>
								  </div>
								</div>
								
							</div>
				               
                    @else
                    	<h3 class="page-title">Add New History </h3>
                  		{!! Form::open(['method' => 'PUT', 'url' => 'admin/clinics/doctor/'.$history->id]) !!}

                  			<div class="row">
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('PresentingComplaint', 'Presenting Complaint*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('PresentingComplaint', old('PresentingComplaint'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('PresentingComplaint'))
				                        <p class="help-block">
				                            {{ $errors->first('PresentingComplaint') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('HistoryPC', 'History PC*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('HistoryPC', old('HistoryPC'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('HistoryPC'))
				                        <p class="help-block">
				                            {{ $errors->first('HistoryPC') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('FamilyHistory', 'Family History*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('FamilyHistory', old('FamilyHistory'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('FamilyHistory'))
				                        <p class="help-block">
				                            {{ $errors->first('FamilyHistory') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('SocialHistory', 'Social History*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('SocialHistory', old('SocialHistory'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('SocialHistory'))
				                        <p class="help-block">
				                            {{ $errors->first('SocialHistory') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('PastMedicalHistory', 'Past Medical History*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('PastMedicalHistory', old('PastMedicalHistory'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('PastMedicalHistory'))
				                        <p class="help-block">
				                            {{ $errors->first('PastMedicalHistory') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('PastSurgicalHistory', 'Past Surgical History *', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('PastSurgicalHistory', old('PastSurgicalHistory'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('PastSurgicalHistory'))
				                        <p class="help-block">
				                            {{ $errors->first('PastSurgicalHistory') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('DrugHistory', 'Drug History*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea  ('DrugHistory', old('DrugHistory'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('DrugHistory'))
				                        <p class="help-block">
				                            {{ $errors->first('DrugHistory') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('AllergyHistory', 'Allergy History *', ['class' => 'control-label']) !!}
				                    {!! Form::textarea  ('AllergyHistory', old('AllergyHistory'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('AllergyHistory'))
				                        <p class="help-block">
				                            {{ $errors->first('AllergyHistory') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
				            {!! Form::hidden('user_name', Auth::user()->firstname .' ' .Auth::user()->lastname ) !!}
				            <div class="row">
				                <div class="col-md-offset-10 col-xs-2 form-group">
				                    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-primary']) !!}
				                </div>
				            </div>

                  		{!! Form::hidden('biodata_id', $biodata->id) !!}

                    	{!! Form::close() !!}	 
                    @endif
                    
                  </div><!-- /Clinic History.tab-pane -->

                  <div class="tab-pane" id="tab_3">                  	
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    @if (count($vitalsigns) > 0)
                    	<div class="row">
                		<div class="col-xs-12">
	                    	<div class="row table-responsive">
	                    		<table class="table table-bordered" cellpadding="2">
								<thead>
	                                           <tr>
	                                                <th>Blood Pressure </th>
	                                                <th>Temperature </th>
													<th>Pulse Rate </th>
	                                                <th>Heart Rate </th>
	                                                <th>Weight </th>
	                                                <th>Lenght </th>
	                                                <th>Respiratory Rate </th>
													<th>Head Circumference </th>
													<th>Abdominal Girth </th>
													<th>Oxygen Saturation </th>
													<th>CO2 </th>
													<th>Blood PH</th>
													<th>Fasting Blood Sugar </th>
													<th>Random Blood Sugar  </th>
													<th>Input Volumn </th>
													<th>Urine Output </th>
													<th>MUAC </th>
<<<<<<< HEAD
	                                                <th>Time </th>
=======
	                                                
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	                                           </tr>
	                            </thead>
								<tbody>
								 @foreach($vitalsigns as $vitalsign)
									<tr>
										<td>{{ $vitalsign->BloodPressure}}</td><td>{{ $vitalsign->Temperature }}</td><td>{{ $vitalsign->PulseRate }}</td>
										<td>{{ $vitalsign->HeartRate }}</td><td>{{ $vitalsign->Weight}}</td><td>{{ $vitalsign->Length}}</td>
<<<<<<< HEAD
										<td>{{ $vitalsign->RespiratoryRate }}</td><td>{{ $vitalsign->HeadCircumference }}</td><td>{{ $vitalsign->AdbominalGirth }}</td>
										<td>{{ $vitalsign->OxygenSaturation  }}</td> <td>{{ $vitalsign->CO2}}</td><td>{{ $vitalsign->BloodPH}}</td>
										<td>{{ $vitalsign->FastingBloodSugar }}</td><td>{{ $vitalsign->RandomBloodSugar}}</td>
										<td>{{ $vitalsign->InputVolumn }}</td><td>{{ $vitalsign->OuputVolumn }}</td><td>{{ $vitalsign->MUAC }}</td><td>{{ $vitalsign->created_at }}</td>
=======
										<td>{{ $vitalsign->RespiratoryRate }}</td>><td>{{ $vitalsign->HeadCircumference }}</td><td>{{ $vitalsign->AdbominalGirth }}</td>
										<td>{{ $vitalsign->OxygenSaturation  }}</td> <td>{{ $vitalsign->CO2}}</td><td>{{ $vitalsign->BloodPH}}</td>
										<td>{{ $vitalsign->FastingBloodSugar }}</td> ><td>{{ $vitalsign->RandomBloodSugar}}</td>
										<td>{{ $vitalsign->InputVolumn }}</td><td>{{ $vitalsign->OuputVolumn }}</td><td>{{ $vitalsign->MUAC }}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	                    			</tr>
									@endforeach
									</tbody>
	                    		</table>
	                    	</div>
	                    </div>
	                 </div>
                    		
                     @else
                    	<h2> No record !!! </h2>
                     @endif
<<<<<<< HEAD
                    
                  </div><!-- /Clinic History.tab-pane -->

                  <div class="tab-pane" id="tab_3">                  	
				  		 @if ($history->PresentingComplaint != '')
                    		<div class="row">
                    			<div class="col-xs-12">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>Clinical History:</strong></p>
								  		<textarea>{{ $history->PresentingComplaint }} </textarea>
								  	</div>
								  </div>
								</div>							  	
							</div>						
				               
                    @else
                    	<h3 class="page-title">Add New History </h3>
                  		{!! Form::open(['method' => 'PUT', 'url' => 'admin/clinics/doctor/'.$history->id]) !!}

                  			<div class="row">
				                <div class="col-xs-12 form-group">
				                    {!! Form::label('PresentingComplaint', 'Clinical History*', ['class' => 'control-label']) !!}
				                    <textarea name='PresentingComplaint'> </textarea>									
				                    <p class="help-block"></p>
				                    @if($errors->has('PresentingComplaint'))
				                        <p class="help-block">
				                            {{ $errors->first('PresentingComplaint') }}
				                        </p>
				                    @endif
				                </div>				                
				            </div>
				            {!! Form::hidden('user_name', Auth::user()->firstname .' '.Auth::user()->lastname ) !!}
				            <div class="row">
				                <div class="col-md-offset-10 col-xs-2 form-group">
				                    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-primary']) !!}
				                </div>
				            </div>

                  		{!! Form::hidden('biodata_id', $biodata->id) !!}

                    	{!! Form::close() !!}	 
                    @endif
                  </div><!-- /.clicincalhistory tab-pane -->
				  
                  <div class="tab-pane" id="tab_4">                  	
                   @if (count($examination) > 0)
                    		<div class="row">
                    			<div class="col-xs-12">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>Examination:</strong></p>
								  		<textarea>{{$examination->GeneralPhysical}}</textarea>
								  	</div>
								  </div>
								</div>		 	
=======
                  </div><!-- /.VitalSign tab-pane -->
				  
                  <div class="tab-pane" id="tab_4">                  	
                   @if (count($examination) > 0)
                    		<div class="row">
                    			<div class="col-xs-4">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>General Physical:</strong></p>
								  		{{$examination->GeneralPhysical}}
								  	</div>
								  </div>
								</div>
							  	<div class="col-xs-4">
								  <div class="panel panel-success">
								  	<div class="panel-body">
								  		<p><strong>Cardiovascular:</strong></p>
								  			{{$examination->Cardiovascular }} 
								  	</div>
								  </div>
								</div>
								<div class="col-xs-4">
								  <div class="panel panel-danger">
								  	<div class="panel-body">
								  		<p><strong>	Neurologic:</strong></p>
								  			{{$examination->Neurologic }}
								  	</div>
								  </div>
								</div>
							</div>
							<div class="row">
                    			<div class="col-xs-4">
								  <div class="panel panel-info">
								  	<div class="panel-body">
								  		<p><strong>Musculoskeletal:</strong></p>
								  		{{$examination->Musculoskeletal }} 
								  	</div>
								  </div>
								</div>
							  	<div class="col-xs-4">
								  <div class="panel panel-default">
								  	<div class="panel-body">
								  		<p><strong>Respiratory:</strong></p>
								  		{{$examination->Respiratory}}
								  	</div>
								  </div>
								</div>
								<div class="col-xs-4">
								  <div class="panel panel-warning">
								  	<div class="panel-body">
								  		<p><strong>Abdomial:</strong></p>
								  		{{$examination->Abdomial}}
								  	</div>
								  </div>
								</div>
							</div>
							<div class="row">
                    			<div class="col-xs-4">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>Mental State:</strong></p>
								  		{{$examination->MentalState}} 
								  	</div>
								  </div>
								</div>
							  	<div class="col-xs-4">
								  <div class="panel panel-success">
								  	<div class="panel-body">
								  		<p><strong>ENT:</strong></p>
								  		{{$examination->ENT}}
								  	</div>
								  </div>
								</div>
								<div class="col-xs-4">
								  <div class="panel panel-success">
								  	<div class="panel-body">
								  		<p><strong>Eye:</strong></p>
								  		{{$examination->Eye}}
								  	</div>
								  </div>
								</div>							
								
							</div>
							<div class="row">
                    			<div class="col-xs-4">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>Dental:</strong></p>
								  		{{$examination->Dental}} 
								  	</div>
								  </div>
								</div>
							  	<div class="col-xs-4">
								  <div class="panel panel-success">
								  	<div class="panel-body">
								  		<p><strong>Chest:</strong></p>
								  		{{$examination->Chest}}
								  	</div>
								  </div>
								</div>
								<div class="col-xs-4">
								  <div class="panel panel-success">
								  	<div class="panel-body">
								  		<p><strong>Neck:</strong></p>
								  		{{$examination->Neck}}
								  	</div>
								  </div>
								</div>							
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
								
							</div>
				               
                    @else
                    	<h3 class="page-title">Add New Examination </h3>
                  		{!! Form::open(['method' => 'POST', 'url' => 'admin/clinics/doctor/examination']) !!}

                  			<div class="row">
<<<<<<< HEAD
				                <div class="col-xs-12 form-group">
				                    {!! Form::label('GeneralPhysical', 'General Physical *', ['class' => 'control-label']) !!}
				                    <textarea name='GeneralPhysical'> </textarea>									
=======
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('GeneralPhysical', 'General Physical *', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('GeneralPhysical', old('GeneralPhysical'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				                    <p class="help-block"></p>
				                    @if($errors->has('GeneralPhysical'))
				                        <p class="help-block">
				                            {{ $errors->first('GeneralPhysical') }}
				                        </p>
				                    @endif
<<<<<<< HEAD
				                </div>				               
=======
				                </div>
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('Cardiovascular', 'Cardiovascular*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('Cardiovascular', old('Cardiovascular'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('Cardiovascular'))
				                        <p class="help-block">
				                            {{ $errors->first('Cardiovascular') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('Neurologic', 'Neurologic*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('Neurologic', old('Neurologic'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('Neurologic'))
				                        <p class="help-block">
				                            {{ $errors->first('Neurologic') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('Musculoskeletal', 'Musculoskeletal*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('Musculoskeletal', old('Musculoskeletal'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('Musculoskeletal'))
				                        <p class="help-block">
				                            {{ $errors->first('Musculoskeletal') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
				            <div class="row">
				               <div class="col-xs-6 form-group">
				                    {!! Form::label('Chest', 'Chest *', ['class' => 'control-label']) !!}
				                    {!! Form::textarea  ('Chest', old('Chest'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('Chest'))
				                        <p class="help-block">
				                            {{ $errors->first('Chest') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('Abdomial', 'Abdomial*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('Abdomial', old('Abdomial'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('Abdomial'))
				                        <p class="help-block">
				                            {{ $errors->first('Abdomial') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('MentalState', 'Mental State*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea  ('MentalState', old('MentalState'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('MentalState'))
				                        <p class="help-block">
				                            {{ $errors->first('MentalState') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('ENT', 'ENT *', ['class' => 'control-label']) !!}
				                    {!! Form::textarea ('ENT', old('ENT'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('ENT'))
				                        <p class="help-block">
				                            {{ $errors->first('ENT') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('Dental', 'Dental *', ['class' => 'control-label']) !!}
				                    {!! Form::textarea  ('Dental', old('Dental'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('Dental'))
				                        <p class="help-block">
				                            {{ $errors->first('Dental') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('Eye', 'Eye *', ['class' => 'control-label']) !!}
				                    {!! Form::textarea ('Eye', old('Eye'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('Eye'))
				                        <p class="help-block">
				                            {{ $errors->first('Eye') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
				            <div class="row">
				                
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('Neck', 'Neck  *', ['class' => 'control-label']) !!}
				                    {!! Form::textarea ('Neck', old('Neck'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('Neck'))
				                        <p class="help-block">
				                            {{ $errors->first('Neck') }}
				                        </p>
				                    @endif
				                </div>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				            </div>
				            <div class="row">
				                <div class="col-md-offset-10 col-xs-2 form-group">
				                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
				                </div>
				            </div>

                  		{!! Form::hidden('clinicHistory_id', $history->id) !!}

                    	{!! Form::close() !!}	 
                    @endif
                    
                  </div><!-- /Examinature.tab-pane -->
                  <div class="tab-pane" id="tab_5"> 
                  	<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						  Add New Prescription
						</button> 

						<p> </p>                	
                    @if (count($prescriptions) > 0)                   
						
							<div class="row">
                    			<div class="col-md-offset-1 col-xs-11">
								  
								  		<table class="table table-bordered">
								  			@foreach ($prescriptions as $prescription)
									  			<tr>
<<<<<<< HEAD
									  				<td><strong>{{$prescription->DrugRoute}}&nbsp;&nbsp;  {{$prescription->DrugName}}&nbsp;&nbsp;  {{$prescription->DrugDose}}{{$prescription->DrugDoseUnit}} &nbsp;&nbsp;  {{$prescription->DrugFrequency}}  {{$prescription->DrugFrequencyUnit}}&nbsp;&nbsp; {{$prescription->DrugDuration}} {{$prescription->DrugDurationUnit}}</strong></td><td>{{ $prescription->created_at }} </td>
													<td>
														 {!! Form::open(array(
															'style' => 'display: inline-block;',
															'method' => 'DELETE',
															'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
															'url' => ['admin/clinics/prescription', $prescription->id])) !!}
														{!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
														{!! Form::close() !!}
													</td>
=======
									  				<td><strong>{{$prescription->DrugRoute}}&nbsp;&nbsp;  {{$prescription->DrugName}}&nbsp;&nbsp;  {{$prescription->DrugDose}}{{$prescription->DrugDoseUnit}} &nbsp;&nbsp;  {{$prescription->DrugFrequency}} X {{$prescription->DrugFrequencyUnit}}&nbsp;&nbsp;  {{$prescription->DrugDuration}} X {{$prescription->DrugDurationUnit}}</strong></td><td>{{date('jS F, Y',strtotime($prescription->created_at)) }} </td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
									  			</tr>
								  			@endforeach
								  		</table>
								  		
								  	
								</div>		  	
								
							</div>
                  		
                    @else
                    	<h2> No Records yet !! </h2>
                    @endif
                    
                  </div><!-- /Prescription.tab-pane -->
<<<<<<< HEAD
                  
                  <div class="tab-pane" id="tab_6">         	
=======
                  <div class="tab-pane" id="tab_6">        	
	                
					<p> </p>
                  	@if (count($reports) > 0)
	                  	<div class="row">
	                		<div class="col-md-offset-1 col-xs-10">
		                  		<div class="row table-responsive">
		                    		<table class="table table-bordered">
		                    			<thead>
						                    <tr>
						                        <th>Report</th>
						                        <th>Nurse On Duty</th>                        
						                        <th>Time</th>                  

						                    </tr>
						                </thead>
						                @foreach ($reports as $report)
			                    			<tr>
			                    				<td>{{ $report->Report}}</td> 
			                    				<td>{{ $report->user_id}}</td>
			                    				<td>{{ date('jS F, Y',strtotime($report->created_at))}}</td>
			                    			</tr>                    			
		                    			@endforeach
		                    		</table>
		                    	</div>
		                    </div>
		                </div>	

                    @else
                    	<h2> No Records yet !! </h2>
                    	
                    @endif                   
                  </div><!-- /Nurse report.tab-pane -->

                  <div class="tab-pane" id="tab_7">         	
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
									                  	
                    @if (count($procedures) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table width='500' class="table table-bordered">
										  @foreach ($procedures as $procedure)
								  			<tr>
								  				<td><strong>Name:</strong></td><td>{{$procedure->Name }} </td><td><strong>Cost:</strong> </td><td>{{$procedure->Cost }} </td>
								  			</tr>
											@endforeach
								  		</table>
								  		
								</div>		  	
								
							</div>                  								
						
                    @else
                   
                    	
                    @endif
					 <!-- Button trigger modal -->
					<a href="#" class="btn btn-primary pros">Add New Procedure</a>
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/clinics/doctor/procedure']) !!}
                    	<div class="row">
                			<div class="col-md-offset-1 col-xs-10">
		                    	<div class="row table-responsive">
		                    		<table class="table table-bordered">
		                    			
		                    			<tbody class="prolog">
					                    	

					                    </tbody>


		                    	   	</table>
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">		                	
					        <div class="col-md-offset-10 col-xs-2 form-group">
					            {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
					        </div>
					    </div>
					            
				            	{!! Form::hidden('clinicHistory_id', $history->id) !!}
				                {!! Form::close() !!}
                  		
                  </div><!-- /procedure.tab-pane -->

<<<<<<< HEAD
                   <div class="tab-pane" id="tab_7">                  	
=======
                  <div class="tab-pane" id="tab_8">                  	
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    @if (count($laboratories) > 0)                    	
							<div class="row">
                    			<div class="col-md-offset-1 col-xs-10">
		                    		<div class="row table-responsive">
		                    			<table class="table table-bordered">
								  			<thead>
			                    				<tr>
				                    				<th>INVESTIGATION</th>
							                        <th>RESULT</th>
							                        <th>REFERENCE</th>
							                        <th>COST</th>						                        
							                    </tr>
					                    	</thead>
						                    <tbody>
						                    	@foreach ($laboratories as $laboratory)
													<tr><td><strong>{{$laboratory->LabTestName}}</strong></td><td>{{$laboratory->Result}}</td><td>{{$laboratory->Reference}}</td><td>{{$laboratory->LabCost}}</td></tr>
												@endforeach
						                    </tbody>
								  		</table>
								  		
								  	</div>
								  
								</div>		  	
								
							</div>						                		
                  		
                    @else
                    
                    @endif
<<<<<<< HEAD
					<h4> Scan Documents </h4>
					<div class="row">
                    	<div class="col-md-offset-1 col-xs-10">
		                    <div class="row table-responsive">
		                    	<table class="table table-bordered">
									<tbody>
									@if (count($labfiles) > 0) 
						                @foreach ($labfiles as $labfile)
											<tr><td><strong><a href="{{asset($labfile->Url)}}"  target="_blank"> {{$labfile->Name}} </a></strong></td>	
										@endforeach
									 @else
                                      <h4>No records </h4>
                                     @endif
						            </tbody>

								</table>
							</div>
						</div>
					</div>
					<hr />
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
					<div class="row">
                   		<div class="col-xs-2 form-group">
					            <a href="#" class="btn btn-success labs">Add New Row</a>
					     </div>
					</div>
                    	{!! Form::open(['method' => 'POST', 'url' => 'admin/clinics/lab']) !!}
                    	<div class="row">
                			<div class="col-md-offset-1 col-xs-10">
		                    	<div class="row table-responsive">
		                    		<table class="table table-bordered" id='lab'>
		                    			
		                    			<thead>
		                    				<tr>
			                    				<th>INVESTIGATION</th>
						                        <th>RESULT</th>
						                        <th>REFERENCE</th>
						                        <th>COST</th>
						                    </tr>
					                    </thead>
					                    <tbody class="lab">
					                    	
					                    </tbody>


		                    	   	</table>
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">		                	
					        <div class="col-md-offset-10 col-xs-2 form-group">
					            {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
					        </div>
					    </div>
					            
				            	{!! Form::hidden('clinicHistory_id', $history->id) !!}
				                {!! Form::close() !!}
<<<<<<< HEAD
								
               <hr />
			   <h4> Upload Files </h4>
			   <hr />
			    {!! Form::open(array('method' => 'POST','url' => '/admin/fileUpload','enctype' => 'multipart/form-data')) !!} 
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
					<div class="col-md-3">

						<button type="submit" class="btn btn-success">Upload</button>
					</div>
				</div>
				
				{!! Form::hidden('clinicHistory_id', $history->id) !!}
				{!! Form::close() !!}
                  </div><!-- /.lab tab-pane -->
                  <div class="tab-pane" id="tab_8"> 
=======
                    
                  </div><!-- /.lab tab-pane -->
                  <div class="tab-pane" id="tab_9"> 
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                  	<div class="row">
                  		<div class="col-xs-4">
                  <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#management">
						  Add New Management
						</button>
						</div>      	
					</div>	
					<p> </p>					                  	
                    @if (count($manages) > 0)
                    	
							<div class="row table-responsive">
<<<<<<< HEAD
                    			<div class="col-md-offset-1 col-xs-11">								  						  		
								  		<table width='500' class="table table-bordered">
								  			@foreach($manages as $manage)
								  			<tr>
								  				<td>{{ $manage->created_at }}</td><td><textarea>{{ $manage->Management }}</textarea></td>
=======
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table width='500' class="table table-bordered">
								  			@foreach($manages as $manage)
								  			<tr>
								  				<td>{{ $manage->Management }}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
								  			</tr>
								  			@endforeach
								  		</table>`
								  		
								  	</div>		  	
								
							</div>
                  		
                  		
                    @else
                    <h2> No record found </h2>
                    @endif
                    
                  </div><!-- /management.tab-pane -->

<<<<<<< HEAD
				  <div class="tab-pane" id="tab_9"> 
=======
				  <div class="tab-pane" id="tab_10"> 
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                  	<div class="row">
                  		<div class="col-xs-4">
                  <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Diagnosis">
						  Add New Diagnosis
						</button>
						</div>      	
					</div>	
					<p> </p>					                  	
                    @if (count($diagnoses) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table width='500' class="table table-bordered">
								  			@foreach($diagnoses as $diagnosis)
								  			<tr>
<<<<<<< HEAD
								  				<td><textarea>{{ $diagnosis->Diagnosis }}</textarea></td>
=======
								  				<td>{{ $diagnosis->Diagnosis }}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
								  			</tr>
								  			@endforeach
								  		</table>`
								  		
								  	</div>		  	
								
							</div>
                  		
                  		
                    @else
                    <h2> No record found </h2>
                    @endif
                    
                  </div><!-- /diagnosis.tab-pane -->
<<<<<<< HEAD
				  <div class="tab-pane" id="tab_10">        	
	                
					<p> </p>
                  	@if (count($reports) > 0)
	                  	<div class="row">
	                		<div class="col-md-offset-1 col-xs-10">
		                  		<div class="row table-responsive">
		                    		<table class="table table-bordered">
		                    			<thead>
						                    <tr>
						                        <th>Report</th>
						                        <th>Nurse On Duty</th>                        
						                        <th>Time</th>                  

						                    </tr>
						                </thead>
						                @foreach ($reports as $report)
			                    			<tr>
			                    				<td>{{ strip_tags($report->Report)}}</td> 
			                    				<td>{{ $report->user_id}}</td>
			                    				<td>{{ $report->created_at }}</td>
			                    			</tr>                    			
		                    			@endforeach
		                    		</table>
		                    	</div>
		                    </div>
		                </div>	

                    @else
                    	<h2> No Records yet !! </h2>
                    	
                    @endif                   
                  </div><!-- /Nurse report.tab-pane -->

				  <div class="tab-pane" id="tab_11">                  	
				  <div class="row">
                  		<div class="col-xs-4">
                  <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Allergy">
						  Add New Allergy
						</button>
						</div>      	
					</div>	
					<p> </p>					                  	
                    @if (count($allergies) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table width='500' class="table table-bordered">
								  			@foreach($allergies as $allergy)
								  			<tr>
								  				<td><textarea>{{ $allergy->Name }}</textarea></td>
												<td>{{ $allergy->Staffname }}</td>
												<td>{{ $allergy->created_at }}</td>
								  			</tr>
								  			@endforeach
								  		</table>`
								  		
								  	</div>		  	
								
							</div>
                  		
                  		
                    @else
                    <h2> No record found </h2>
                    @endif
                    
                  </div><!-- /allergy.tab-pane -->
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
        </div>     

     <!-- Prescription Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Prescription</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	<h3 class="page-title">Add New Prescription </h3>
                  		{!! Form::open(['method' => 'POST', 'url' => 'admin/clinics/doctor/prescription']) !!}

                  			<div class="row">
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('DrugRoute', 'Drug Route*', ['class' => 'control-label']) !!}
<<<<<<< HEAD
				                    {!! Form::select('DrugRoute', ['Syrup' => 'Syrup', 'Suspension' => 'Suspension', 'Tablet' => 'Tablet', 'Capsule' => 'Capsule', 'Intravenous' => 'Intravenous', 'Intramuscular' => 'Intramuscular', 'Subcutaneous' => 'Subcutaneous','Intranasal' => 'Intranasal', 'Sublingual' => 'Sublingual', 'Intrathecal' => 'Intrathecal', 'Intralesional' => 'Intralesional', 'Tropical' => 'Tropical','Inhalational' => 'Inhalational','Epidural' => 'Epidural','Eye Drop' => 'Eye Drop','Ear Drop' => 'Ear Drop', 'Intraosseous' => 'Intraosseous', 'Lotion' => 'Lotion', 'Pessary'=> 'Pessary', 'Consummable' => 'Consummable', 'Package' => 'Package'], null, ['class' => 'form-control drugRoute','placeholder' => 'Pick a Drug Route...']); !!}
=======
				                    {!! Form::select('DrugRoute', ['Syrup' => 'Syrup', 'Suspension' => 'Suspension', 'Tablet' => 'Tablet', 'Capsule' => 'Capsule', 'Intravenous' => 'Intravenous', 'Intramuscular' => 'Intramuscular', 'Subcutaeous' => 'Subcutaeous', 'Sublingual' => 'Sublingual', 'Intrathecal' => 'Intrathecal', 'Intralesional' => 'Intralesional', 'Tropical' => 'Tropical','Inhalational' => 'Inhalational','Epidural' => 'Epidural','Eye Drop' => 'Eye Drop','Ear Drop' => 'Ear Drop', 'Intraosseous' => 'Intraosseous'], null, ['class' => 'form-control drugRoute','placeholder' => 'Pick a Drug Route...']); !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				                    <p class="help-block"></p>
				                    @if($errors->has('DrugRoute'))
				                        <p class="help-block">
				                            {{ $errors->first('DrugRoute') }}
				                        </p>
				                    @endif
				                </div>
<<<<<<< HEAD
				                 <div class="col-xs-6 form-group">
				                    {!! Form::label('DrugName', 'Drug Name *', ['class' => 'control-label']) !!}
				                   	<select class="itemName form-control" name="DrugName">
									   </select>
=======
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('DrugName', 'Drug Name *', ['class' => 'control-label']) !!}
				                   	<select name='DrugName' class='form-control drug'>
									   
									</select>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				                    <p class="help-block"></p>
				                    @if($errors->has('DrugName'))
				                        <p class="help-block">
				                            {{ $errors->first('DrugName') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
				            <div class="row">
				            	<div class="col-xs-6 form-group">
				                    {!! Form::label('DrugDose', 'Drug Dose*', ['class' => 'control-label']) !!}
				                    {!! Form::text('DrugDose', old('DrugDose'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('DrugDose'))
				                        <p class="help-block">
				                            {{ $errors->first('DrugDose') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                	{!! Form::label(' ', ' Unit', ['class' => 'control-label']) !!}
<<<<<<< HEAD
				                	{!! Form::select('DrugDoseUnit', ['mg' => 'mg', 'i.u' => 'i.u', 'gram' => 'gram', 'L' => 'L' ,'ml' => 'ml', 'mcg' => 'mcg', 'mmol' => 'mmol', 'tab' => 'tab', 'amp' => 'amp', 'vial' => 'vial', 'cap'=> 'cap', 'drop' => 'drop','nebule' => 'nebule', 'On lesion' => 'On lesion', 'Pessary'=> 'Pessary','Pack'=> 'Pack'], null, ['class' => 'form-control','placeholder' => 'Pick a Dose Unit...']); !!}
=======
				                	{!! Form::select('DrugDoseUnit', ['mg' => 'mg', 'i.u' => 'i.u', 'gram' => 'gram', 'ml' => 'ml', 'ug' => 'ug', 'mmol' => 'mmol'], null, ['class' => 'form-control','placeholder' => 'Pick a Dose Unit...']); !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				                </div>
				            </div>
				            <div class="row">
				            	<div class="col-xs-6 form-group">
				                    {!! Form::label('DrugFrequency', 'Drug Frequency*', ['class' => 'control-label']) !!}
				                    {!! Form::text('DrugFrequency', old('DrugFrequency'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('DrugFrequency'))
				                        <p class="help-block">
				                            {{ $errors->first('DrugFrequency') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                	{!! Form::label(' ', ' Unit', ['class' => 'control-label']) !!}
<<<<<<< HEAD
				                	{!! Form::select('DrugFrequencyUnit', [ '.' => '.', 'Stat' => 'Stat', 'hourly' => 'hourly', 'over 10 minutes' => 'over 10 minutes','Over 20 minutes' => 'Over 20 minutes', '30 minutes before food'=> '30 minutes before food', 'stat' => 'stat', 'fast' => 'fast', 'bolus' => 'bolus', 'daily' => 'daily', 'nocte'=> 'nocte', 'Over 6 hours' => 'Over 6 hours', 'Over 8 hours'=> 'Over 8 hours', 'Over 12 hours' => 'Over 12 hours', 'Over 24 hours'=> 'Over 24 hours', 'prn' => 'prn'], null, ['class' => 'form-control','placeholder' => 'Pick a Unit...']); !!}
=======
				                	{!! Form::select('DrugFrequencyUnit', ['hourly' => 'hourly', 'over 10 minutes' => 'over 10 minutes', 'stat' => 'stat', 'bolus' => 'bolus', 'daily' => 'daily'], null, ['class' => 'form-control','placeholder' => 'Pick a Unit...']); !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				                </div>
				            </div>
				            <div class="row">
				            	<div class="col-xs-6 form-group">
				                    {!! Form::label('DrugDuration', 'Drug Duration*', ['class' => 'control-label']) !!}
				                    {!! Form::text('DrugDuration', old('DrugDuration'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('DrugDuration'))
				                        <p class="help-block">
				                            {{ $errors->first('DrugDuration') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                	{!! Form::label(' ', ' Unit', ['class' => 'control-label']) !!}
<<<<<<< HEAD
				                	{!! Form::select('DrugDurationUnit', ['.' => '.', 'Stat' => 'Stat', 'Hours' => 'Hours','Days' => 'Days', 'Weekly' => 'Weekly', 'Monthly' => 'Monthly', 'Doses'=> 'Doses'], null, ['class' => 'form-control','placeholder' => 'Pick a Unit...']); !!}
=======
				                	{!! Form::select('DrugDurationUnit', ['Hours' => 'Hours','Days' => 'Days', 'Weekly' => 'Weekly', 'Monthly' => 'Monthly'], null, ['class' => 'form-control','placeholder' => 'Pick a Unit...']); !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				                </div>								
				            </div>
							<div class="row">
				                <div class="col-xs-6 form-group cost">
				                    
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-md-offset-10 col-xs-2 form-group">
				                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
				                </div>
				            </div>

                  		{!! Form::hidden('clinicHistory_id', $history->id) !!}

                    	{!! Form::close() !!}	

				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>

 
<!-- Management Modal -->
<div class="modal fade" id="management" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Management</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/clinics/doctor/management']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
						                    {!! Form::label('Management', 'Management*', ['class' => 'control-label']) !!}
<<<<<<< HEAD
											<textarea name='Management'> </textarea>						                   
=======
						                    {!! Form::textarea  ('Management', old('Management'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
						                    <p class="help-block"></p>
						                    @if($errors->has('Management'))
						                        <p class="help-block">
						                            {{ $errors->first('Management') }}
						                        </p>
						                    @endif
						                </div>
				                </div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            
						            	{!! Form::hidden('clinicHistory_id', $history->id) !!}
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>

<!-- Diagnosis Modal -->
<div class="modal fade" id="Diagnosis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Diagnosis</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/clinics/doctor/diagnosis']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
						                    {!! Form::label('Diagnosis', 'Diagnosis*', ['class' => 'control-label']) !!}
<<<<<<< HEAD
											<textarea name='Diagnosis'> </textarea>						                   
=======
						                    {!! Form::textarea  ('Diagnosis', old('Diagnosis'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
						                    <p class="help-block"></p>
						                    @if($errors->has('Diagnosis'))
						                        <p class="help-block">
						                            {{ $errors->first('Diagnosis') }}
						                        </p>
						                    @endif
						                </div>
				                </div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            
						            	{!! Form::hidden('clinicHistory_id', $history->id) !!}
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>

<<<<<<< HEAD
<!-- Allergy Modal -->
<div class="modal fade" id="Allergy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Allergy</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/clinics/doctor/allergy']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
						                    {!! Form::label('Name', 'Name*', ['class' => 'control-label']) !!}
						                    <textarea name='Name'> </textarea>
						                    <p class="help-block"></p>
						                    @if($errors->has('Name'))
						                        <p class="help-block">
						                            {{ $errors->first('Name') }}
						                        </p>
						                    @endif
						                </div>
				                </div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            
						            	{!! Form::hidden('biodata_id', $biodata->id) !!}
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>


@stop
@section('javascript') 
<script>
=======

@stop
@section('javascript') 
    <script>
    var j = 0;
       $('.pros').on('click', function(){
       		 var env = window.location.host;
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }
       		 console.log($("#hmo").val());
			 console.log($("#id").val());
				$.ajax({
				data: {
					regType: $("#hmo").val(),
					id: $("#id").val(),
					_token: '{!! csrf_token() !!}'
				},
		    	url: baseurl + '/admin/pros',
		        method: 'GET',
		        dataType: 'json',
		        success:function(data) {
		        	//console.log(data);
		        	var html = "<tr class='trow"+j+"'><td><select class='form-control' name='rows["+ j +"][Name]'><option value='1'>Pick a Procedure</option>";
		        	    for (var i=0; i < data.length; i++) {
		        	    	html += "<option value='"+i+"'>"+data[i].Name+"</option>";
		        		}
		        	    html += "</select></td> <td class='cost'><input type='text' class='form-control' name='rows["+ j +"][Cost]'/></td></tr>"
		        	    
						$('tbody.prolog').append(html);
		        	    console.log(j);
		        	

				        $('select').on('change', function(e) {
				              // Additional JavaScript
							  	e.preventDefault();						       	
						        var cost = "<input type='text' class='form-control' name='rows["+ j +"][Cost]' value='"+data[$(this).val()].Cost+"'/>";
						        $('.trow'+j+' option').val(data[$(this).val()].Name);
						        $('.trow'+j+' td.cost').html(cost);
						    	 
					    });
		        					    	
					  
				}
			        
	    	});
			j++;

       	    
       });
		
    </script>
     <script>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    var j = 0;
       $('.labs').on('click', function(){
		   
       		 var env = window.location.host;
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }
       		 $.ajax({
				data: {
					regType: $("#hmo").val(),
					id: $("#id").val(),
					_token: '{!! csrf_token() !!}'
				},
		    	url:baseurl + '/admin/labs',
		        method: 'GET',
		        dataType: 'json',
		        success:function(data) {
		        	//console.log(data);
		        	var html = "<tr class='trow"+j+"'><td><select class='form-control' name='rows["+ j +"][LabTestName]'><option value='1'>Pick a Test</option>";
		        	    for (var i=0; i < data.length; i++) {
		        	    	html += "<option value='"+i+"'>"+data[i].LabTestName+"</option>";
		        		}
		        	    html += "</select></td> <td><input type='text' class='form-control' name='rows["+ j +"][Result]' /></td> <td class='ref'><input type='text' class='form-control' name='rows["+ j +"][Reference]'/></td><td class='cost'><input type='text' class='form-control' name='rows["+ j +"][LabCost]'/></td></tr>"
		        	    $('tbody.lab').append(html);
		        	    console.log(j);
		        	

				        $('select').on('change', function(e) {
				              // Additional JavaScript
				              	e.preventDefault();					       	
						        var ref = "<input type='text' class='form-control' name='rows["+ j +"][Reference]' value='"+data[$(this).val()].Reference+"'/>";
						        var cost = "<input type='text' class='form-control' name='rows["+ j +"][LabCost]' value='"+data[$(this).val()].LabCost+"'/>";
						        $('.trow'+j+' option').val(data[$(this).val()].LabTestName);
						        $('.trow'+j+' td.ref').html(ref);
						    	$('.trow'+j+' td.cost').html(cost);
						    	 
					    });
		        					    	
					    
				}
			        
	    	});
			j++;

       	    /*var html = "<input type='text' class='form-control' name='rows["+ i +"][RESULT]' /></td><td><input type='text' class='form-control' name='rows["+ i +"][REFERENCE]' /></td><td><input type='text' class='form-control' name='rows["+ i +"][COST]' /></td></tr>";
       		
       		i++;*/
       });

<<<<<<< HEAD
 </script>
  <script>
 $(document).ready(function() {
 		var env = window.location.host;
=======
 $('.drugRoute').on('change', function(){
	console.log($("#hmo").val());
	 var env = window.location.host;
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }
<<<<<<< HEAD

 /// Procedure ////
 var j = 0;
  $('.pros').on('click', function(){
	
	var html = "<tr class='trow"+j+"'><td><select class='form-control proItem' name='rows["+ j +"][Name]'>";
	    html += "</select></td> <td class='cost'><input type='text' class='form-control' name='rows["+ j +"][Cost]'/></td></tr>"
		$('tbody.prolog').append(html);	    
		console.log('Hello');
		console.log(j);
		
		$('.prolog tr:eq('+ j +') td:eq(0) .proItem').select2({	 	   
        placeholder: 'Select a Procedure',
		dropdownParent: $(".prolog"),
		dropdownAutoWidth : true,
   		width: '100%',
        ajax: {
		  data: function (params) {
				return {
					q: params.term, // search term
					id: $("#id").val(),
					regType: $("#hmo").val(), 
					}
				},
		  url: baseurl + '/admin/pros',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {	
			 //console.log(data);
			 //console.log($().attr('id'));
			$('select').on('change', function(e) {
				e.preventDefault();	
				//console.log(data);
				var id = $(this).val();
				$.each(data, function (i, d){
					if(data[i].id == id) {
						var cost = d.Cost;
						var k = j - 1;
						$('.trow'+k+' option').val(d.Name);
						$('.trow'+k+' > td > input').val(cost);
						//$('.prolog tr:eq('+ j +') td:eq(1) .cost').val(d.Cost);
						//var cost = "<input type='text' class='form-control' name='rows["+ j +"][Cost]' value='"+d.Cost+"'/>";
						//`$('.prolog tr:eq('+ j +') td:eq(1) .cost').append(cost);
					}
				});
				
			 });	  
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.Name,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });

	  j++;				
 	
  });
  
	  
// Prescriptions

 $('.itemName').select2({
	 	
        placeholder: 'Select a Drug',
		dropdownParent: $("#exampleModal"),
		dropdownAutoWidth : true,
   		width: '100%',
        ajax: {
		  data: function (params) {
				return {
					q: params.term, // search term
					id: $("#id").val(),
					regType: $("#hmo").val(), 
					}
				},
		  url: baseurl + '/admin/getDrugs',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
			  console.log(data);  
			$('.itemName').on('change', function(e) {
				e.preventDefault();	
				$.each(data, function (i, d){
					if(data[i].id == $('.itemName').val()) {
					console.log(d.UnitCost);
					$('.cost').empty();
					var txt = "<input type='text' name=Cost class='form-control' value='"+d.UnitCost+"' />";
					$(".itemName option:selected").val(d.DrugName);
					$('.cost').append(txt);
					}
				});
				console.log($('.itemName').val());			   
			    
			 });	  
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.DrugName,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });
	  

// admission
	$('#status').on('change', function(e) {		
		 $.ajax({
            data: {  
                    id: $('.id').val(),                  
                    status: $('#status').val(),
                    _token: '{!! csrf_token() !!}'
                    
            },
            url: baseurl + '/admin/storeAdmission',
            method: 'POST',
            dataType: 'json',
            success:function(data) {
				alert(data.msg);
                location.reload();
                
            } 
            
        }); 
		

	});

});
	

	
    </script>

		<script>	
							  	//Vital Sign Chart
								var data = {!! $chartsigns !!};
									//console.log(data[0]);
								var arr1 = [];
								var arr2 = [];
								var temp = 0;
								var pulse = 0;
								var resp = 0;
								var sp = 0;

								$.each(data, function (i, d){
								if(d.Temperature === null) {
									temp = temp;
								}else {
									temp = parseInt(d.Temperature);
								}
								if(d.RespiratoryRate === null) {
									resp = resp;
								}else {
									resp = parseInt(d.RespiratoryRate);
								}
								if(d.PulseRate === null) {
									pulse = pulse;
								}else {
									pulse = parseInt(d.PulseRate);
								}
									if(d.OxygenSaturation === null) {
									sp = sp;
								}else {
									sp = parseInt(d.OxygenSaturation);
								}
								
								arr1.push({v:d.created_at, w:temp, x:resp });
								arr2.push({v:d.created_at, y:pulse, z:sp });


								});

								
								Morris.Line({
								element: 'vitalsigns1',
								data: arr1,
								xkey: 'v',
								ykeys: ['w', 'x'],
								labels: ['Temp', 'Respiration'],
								parseTime:false,
								lineColors: ['#FF0000', '#6B8E23'],
								lineWidth: 2,
								ymax:41,
								ymin:35,
								

								}); 

								Morris.Line({
								element: 'vitalsigns2',
								data: arr2,
								xkey: 'v',
								ykeys: ['y', 'z'],
								labels: ['Pulse', 'SPO2'],
								parseTime:false,
								lineColors: ['#0000FF', '#FFFF00'],
								lineWidth: 2,
								ymax:180,
                                ymin:40,
								}); 

						    </script>

<script>
  tinymce.init({selector:'textarea'});
</script>

=======
		 $.ajax({
				data: {
					id: $("#id").val(),
					regType: $("#hmo").val(),
					_token: '{!! csrf_token() !!}'
				},
		    	url:baseurl + '/admin/getDrugs',
		        method: 'GET',
		        dataType: 'json',
		        success:function(data) {
					var html = "<option>Pick a Drug Name </option>";
					for (var i=0; i < data.length; i++) {
		        	    	html += "<option value='"+i+"'>"+data[i].DrugName+"</option>";
		        	}

					$('.drug').append(html);
					
					 $('.drug').on('change', function(e) {
						 console.log($(this).val());
						$('.cost').empty();
				    	e.preventDefault();	
						//console.log(data[$(this).val()]);
						var txt = "<input type='text' name=Cost class='form-control' value='"+data[$(this).val()].UnitCost+"' />";
						$(".drug option:selected").val(data[$(this).val()].DrugName);
						$('.cost').append(txt);
						
					});
				}
			        
	    	});
 });	
    </script>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
@endsection

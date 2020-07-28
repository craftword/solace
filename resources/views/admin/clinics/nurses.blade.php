@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.patients.waiting_patients') }}">Waiting Patients</a></li>
    <li class="breadcrumb-item"><a href="{{ url('admin/clinics/view/'.$biodata->id) }}">Histories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nurse Section</li>
  </ol>
</nav>
<<<<<<< HEAD
  @if ($message = Session::get('success'))
=======
 <h3 class="page-title">Patient Clinical Histories (Nurse Section)</h3>
 @if ($message = Session::get('success'))
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
				  		@if($billing[0]->Balance > 0)
						  <blockquote>
						  	Remaining Balance: {{$billing[0]->Balance}} 
						  </blockquote>
						 @endif
				  @endif
	   </div>
		<div class="col-xs-4">
			@if ($admin == null) 
			 						
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
		<!-- /.success pane -->
=======
					<!-- /.success pane -->
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
         <!-- START CUSTOM TABS -->
        <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Patients Profile</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Clinical Histories</a></li> 
                  <li><a href="#tab_3" data-toggle="tab">Vital Signs</a></li>                  
                  <li><a href="#tab_4" data-toggle="tab">Nurse Report</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Procedure</a></li>
                  <li><a href="#tab_6" data-toggle="tab">Prescription</a></li> 
                  <li><a href="#tab_7" data-toggle="tab">Management</a></li>
<<<<<<< HEAD
									<li><a href="#tab_8" data-toggle="tab">Diagnosis</a></li> 
									<li><a href="#tab_9" data-toggle="tab">Input/Output Chart</a></li> 
									<li><a href="#tab_10" data-toggle="tab">Allergies</a></li>                   
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
				   
                  	  @if (count($biodata) > 0)
                  	 	<div class="row">                			
                			<div class="col-md-offset-3 col-xs-7">
                        		<h1>{{ $biodata->Surname }}
		                        {{ $biodata->Firstname }}
		                        {{ $biodata->Middlename }}</h1>
		                     </div>                         	
=======
				  <li><a href="#tab_8" data-toggle="tab">Diagnosis</a></li>                    
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                  	 @if (count($biodata) > 0)
                  	 	<div class="row">                			
                			<div class="col-md-offset-3 col-xs-9">
                        		<h1>{{ $biodata->Surname }}
		                        {{ $biodata->Firstname }}
		                        {{ $biodata->Middlename }}</h1>
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
		                    				<td><strong>State Of Origin</strong></td><td>{{ $biodata->StateOfOrigin }}</td> <td><strong>Marital Status</strong></td><td>{{ $biodata->Nationality}}</td><td><strong>Registration Type</strong></td><td>{{ $biodata->RegistrationType}}</td>
=======
		                    				<td><strong>State Of Origin</strong></td><td>{{ $biodata->StateOfOrigin }}</td> <td><strong>Nationality</strong></td><td>{{ $biodata->Nationality}}</td><td><strong>Registration Type</strong></td><td>{{ $biodata->RegistrationType}}</td>
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
								<a href="{{ URL::to('admin/surgeries/nurse/'.$history->id) }}" class="btn btn-primary" >
								Surgery Section
								</a>
							</div>
							@if($biodata->Sex == 'Female' & $biodata->age > 12 )
							<div class="col-xs-2">	                  
								<a href="{{ URL::to('admin/antenatal/nurse/'.$history->id) }}" class="btn btn-primary" >
								Ante Natal Section
								</a>
							</div>
							    
							<div class="col-xs-2">	                  
								<a href="{{ URL::to('admin/labour/nurse/'.$history->id) }}" class="btn btn-primary" >
								Labour Section
								</a>
							</div> 
							@endif           	
						</div>	          
                        
                        
                    @else
                    	<strong>No Records found</strong>
                     @endif
                    
                  </div><!-- /.tab-pane -->
<<<<<<< HEAD
                   <div class="tab-pane" id="tab_2">                  	
                    @if ($history->PresentingComplaint != '')
                    		<div class="row">
                    			<div class="col-xs-12">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>Clinical History:</strong></p>
										  <tr>
								  				<td><textarea>{{ $history->PresentingComplaint }}</textarea></td>
								  			</tr>
								  	</div>
								  </div>
								</div>							  	
							</div>			
=======
                  <div class="tab-pane" id="tab_2">                  	
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
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				               
                    @else
                    	<h3> No Records yet!! </h3>
                    @endif
                 </div><!-- /.tab-pane -->   
                  <div class="tab-pane" id="tab_3">                  	
<<<<<<< HEAD
                    @if (count($vitalsigns) > 0)					
                    <div class="row">
						
                		<div class="col-xs-12">						    
=======
                    @if (count($vitalsigns) > 0)
                    	<div class="row">
                		<div class="col-xs-12">
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
										<td>{{ $vitalsign->RespiratoryRate }}</td><td>{{ $vitalsign->HeadCircumference }}</td><td>{{ $vitalsign->AdbominalGirth }}</td>
										<td>{{ $vitalsign->OxygenSaturation  }}</td> <td>{{ $vitalsign->CO2}}</td><td>{{ $vitalsign->BloodPH}}</td>
										<td>{{ $vitalsign->FastingBloodSugar }}</td> <td>{{ $vitalsign->RandomBloodSugar}}</td>
<<<<<<< HEAD
										<td>{{ $vitalsign->InputVolumn }}</td><td>{{ $vitalsign->OuputVolumn }}</td><td>{{ $vitalsign->MUAC }}</td><td>{{ $vitalsign->created_at }}</td>
=======
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
					 <h3 class="page-title">Add New VitalSign </h3>

                    	{!! Form::open(['method' => 'POST', 'url' => 'admin/clinics/vitalsign']) !!}
                    	<div class="row">
                			<div class="col-xs-12">
		                    	<div class="row table-responsive">
		                    		<table class="table table-bordered" id='lab'>
		                    			
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
	                                                
	                                           </tr>
	                                    </thead>
					                    <tbody>
                                            <tr>
       	                                       	<td><input type='text' name='BloodPressure' class='form-control'/></td><td><input type='text' name='Temperature' class='form-control' /></td>
												<td><input type='text' name='PulseRate' class='form-control' /></td><td><input type='text' name='HeartRate' class='form-control'/></td>
												<td><input type='text' name='Weight' class='form-control'/></td><td><input type='text' name='Length' class='form-control'/></td>
												<td><input type='text' name='RespiratoryRate' class='form-control'/></td><td><input type='text' name='HeadCircumference' class='form-control'/></td>
												<td><input type='text' name='AdbominalGirth' class='form-control'/></td><td><input type='text' name='OxygenSaturation' class='form-control'/></td>
												<td><input type='text' name='CO2' class='form-control'/></td><td><input type='text' name='BloodPH' class='form-control'/></td>
												<td><input type='text' name='FastingBloodSugar' class='form-control'/></td><td><input type='text' name='RandomBloodSugar' class='form-control'/></td>
												<td><input type='text' name='InputVolumn' class='form-control'/></td><td><input type='text' name='OuputVolumn' class='form-control'/></td><td><input type='text' name='MUAC' class='form-control'/></td>
       	                                    </tr>
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
<<<<<<< HEAD
				                {!! Form::close() !!}                  	                  
				 </div><!-- /.tab-pane -->
=======
				                {!! Form::close() !!}                  	                  </div><!-- /.tab-pane -->
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                  <div class="tab-pane" id="tab_4">                  	
	                  	<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						  Add New Report
						</button>
					
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
<<<<<<< HEAD
			                    				<td><textarea>{{ $report->Report}}</textarea></td> 
			                    				<td>{{ $report->user_id}}</td>
			                    				<td>{{ $report->created_at }}</td>
=======
			                    				<td>{{ $report->Report}}</td> 
			                    				<td>{{ $report->user_id}}</td>
			                    				<td>{{ date('jS F, Y',strtotime($report->created_at))}}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
			                    			</tr>                    			
		                    			@endforeach
		                    		</table>
		                    	</div>
		                    </div>
		                </div>	


                    @else
                    	<h2> No Records yet !! </h2>
                    	
                    @endif                   
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_5">                  	
                    @if (count($procedures) > 0)
                    	@foreach ($procedures as $procedure)
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table width='500' class="table table-bordered">
								  			<tr>
								  				<td><strong>Name:</strong></td><td>{{$procedure->Name }} </td><td><strong>Cost:</strong> </td><td>{{$procedure->Cost }} </td>
								  			</tr>
								  		</table>
								  		
								  	</div>		  	
								
							</div>
                  		@endforeach
                  		
                    @else
                    	<h2> No Procedure yet !! </h2> 
                    @endif
                    
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_6"> 
    				<div id="field" data-field-id="{{$prescriptions}}" ></div>              	
                  		@if (count($prescriptions) > 0)                   
						
							<div class="row">
<<<<<<< HEAD
                		 <div class="col-xs-12">
=======
                    			<div class="col-md-offset-1 col-xs-11">
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
								  
								  		<table class="table table-bordered">
								  			@foreach ($prescriptions as $prescription)
									  			<tr>
<<<<<<< HEAD
									  				<td><strong>{{$prescription->DrugRoute}}&nbsp;&nbsp;  {{$prescription->DrugName}}&nbsp;&nbsp;  {{$prescription->DrugDose}}{{$prescription->DrugDoseUnit}} &nbsp;&nbsp;  {{$prescription->DrugFrequency}}  {{$prescription->DrugFrequencyUnit}}&nbsp;&nbsp;  {{$prescription->DrugDuration}}  {{$prescription->DrugDurationUnit}}</strong></td>
													<td>{{ $prescription->created_at }} </td>
													@if($prescription->Status == "Active")
													<td><a href="#" name="{{$prescription->DrugName}}" class="btn btn-success dispense" id="{{$prescription->clinicHistory_id}}"> Add Drug Dispensed </td>
=======
									  				<td><strong>{{$prescription->DrugRoute}}&nbsp;&nbsp;  {{$prescription->DrugName}}&nbsp;&nbsp;  {{$prescription->DrugDose}}{{$prescription->DrugDoseUnit}} &nbsp;&nbsp;  {{$prescription->DrugFrequency}} X {{$prescription->DrugFrequencyUnit}}&nbsp;&nbsp;  {{$prescription->DrugDuration}} X {{$prescription->DrugDurationUnit}}</strong></td>
													<td>{{date('jS F, Y',strtotime($prescription->created_at)) }} </td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
													<td><a href="#" name="{{$prescription->DrugName}}" class="btn btn-primary google" id="{{$prescription->clinicHistory_id}}" >
														Add New Day
														</a> 
													</td>
<<<<<<< HEAD
													<td style="color:red; display:block;"> <a href="#"> <i class="fa fa-times discontinue" aria-hidden="true"  name="{{$prescription->id}}"></i></a></td>
									  			   
													@else

													<td><button  class="btn btn-success" disabled> Add Drug Dispensed </button></td>
													<td><button class="btn btn-primary" disabled>
														Add New Day
														</button> 
													</td>
													<td> <span style="color:red; display:block;"> DISCONTINUED </span></td>
													 @endif
												  </tr>
=======
									  			</tr>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
								  			@endforeach
								  		</table>

								  
								</div>		  	
								
							</div>

							<div class="row table-responsive">
                    			<div class="col-xs-12">

                    				 @if (count($drugcharts) > 0)
                    				 <h2> Drug Chart </h2>
                    					<hr />
                    					
                    				 	<table class="table table-bordered">
                    				 		<thead>
                    				 			<tr>
                    				 				<th>Day</th><th>Dose</th><th>12am</th><th>1am</th><th>2am</th><th>3am</th>
													<th>4am</th><th>5am</th><th>6am</th><th>7am</th><th>8am</th><th>9am</th><th>10am</th>
													<th>11am</th><th>12pm</th><th>13pm</th><th>14pm</th><th>15pm</th><th>16pm</th><th>17pm</th><th>18pm</th>
													<th>19pm</th><th>20pm</th><th>21pm</th><th>22pm</th><th>23pm</th><th>24pm</th>
                    				 			</tr>
                    				 		</thead>
								  			<tbody>
								  				
						                    	@foreach ($drugcharts as $drugchart)
						                    							                    	
													<tr>
														<td> <strong>{{ $drugchart->day }}</strong> </td>
														<td>{{$drugchart->Dose}}  </td>
														<td><input type="checkbox" name="Zero" id='{{$drugchart->id}}' @if ($drugchart->Zero == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="One" id='{{$drugchart->id}}' @if ($drugchart->One == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Two" id='{{$drugchart->id}}' @if ($drugchart->Two == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Three" id='{{$drugchart->id}}' @if ($drugchart->Three == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Four" id='{{$drugchart->id}}' @if ($drugchart->Four == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Five" id='{{$drugchart->id}}' @if ($drugchart->Five == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Six" id='{{$drugchart->id}}' @if ($drugchart->Six == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Seven" id='{{$drugchart->id}}' @if ($drugchart->Seven == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Eigth" id='{{$drugchart->id}}' @if ($drugchart->Eigth  == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Nine" id='{{$drugchart->id}}' @if ($drugchart->Nine == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Ten" id='{{$drugchart->id}}' @if ($drugchart->Ten  == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Eleven" id='{{$drugchart->id}}' @if ($drugchart->Eleven == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Twelve" id='{{$drugchart->id}}' @if ($drugchart->Twelve == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Thirdteen" id='{{$drugchart->id}}' @if ($drugchart->Thirdteen == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Fourteen" id='{{$drugchart->id}}' @if ($drugchart->Fourteen == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Fifteen" id='{{$drugchart->id}}' @if ($drugchart->Fifteen == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Sixteen" id='{{$drugchart->id}}' @if ($drugchart->Sixteen == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Seventeen" id='{{$drugchart->id}}' @if ($drugchart->Seventeen == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Eighteen" id='{{$drugchart->id}}' @if ($drugchart->Eighteen == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="Nineteen" id='{{$drugchart->id}}' @if ($drugchart->Nineteen == 'no') value="yes" @else value="no" checked='checked'  @endif></td>														
														<td><input type="checkbox" name="Twenty" id='{{$drugchart->id}}' @if ($drugchart->Twenty == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="TwentyOne" id='{{$drugchart->id}}' @if ($drugchart->TwentyOne == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="TwentyTwo" id='{{$drugchart->id}}' @if ($drugchart->TwentyTwo == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="TwentyThree" id='{{$drugchart->id}}' @if ($drugchart->TwentyThree == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														<td><input type="checkbox" name="TwentyFour" id='{{$drugchart->id}}' @if ($drugchart->TwentyFour == 'no') value="yes" @else value="no" checked='checked'  @endif></td>
														
													</tr>
												@endforeach
						                    </tbody>
								  		</table>
                    				  @else

									<h2> No Drug Chart </h2>

									 @endif
                  				</div>
                  			</div>
                  			
                    @else
                    	<h2> No Records yet !! </h2>
                    @endif
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_7">       	
											                  	
                    @if (count($manages) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table width='500' class="table table-bordered">
								  			@foreach($manages as $manage)
								  			<tr>
<<<<<<< HEAD
								  				<td><textarea>{{ $manage->Management }}</textarea></td>
=======
								  				<td>{{ $manage->Management }}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
								  			</tr>
								  			@endforeach
								  		</table>
								  		
								  	</div>		  	
								
							</div>
                  		
                  		
                    @else
                   		 <h2> No Records yet !! </h2>
                    @endif
                  </div><!-- /.tab-pane -->
				  <div class="tab-pane" id="tab_8">                   				                  	
                    @if (count($diagnoses) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table width='500' class="table table-bordered">
								  			@foreach($diagnoses as $diagnosis)
								  			<tr>
<<<<<<< HEAD
											<td><textarea>{{ $diagnosis->Diagnosis}}</textarea></td>  
=======
								  				<td>{{ $diagnosis->Diagnosis }}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
								  			</tr>
								  			@endforeach
								  		</table>
								  		
								  	</div>		  	
								
							</div>
                  		
                  		
                    @else
                    <h2> No record found </h2>
                    @endif
                    
<<<<<<< HEAD
                  </div><!-- /diagnoses.tab-pane -->
				  <div class="tab-pane" id="tab_9">                   				                  	
                    @if (count($inputoutputs) > 0)
                    	<div class="row">
                		<div class="col-xs-12">
	                    	<div class="row table-responsive">
	                    		<table class="table table-bordered" cellpadding="2">
								<thead>
	                                           <tr>
											        <th>Time </th>
	                                                <th>Per Oral (ml) </th>
	                                                <th>IV (ml) </th>
													<th>Urine (ml) </th>
	                                                <th>Vomits (ml) </th>
	                                                <th>Stool (ml) </th>
	                                                	                                                
	                                           </tr>
	                            </thead>
								<tbody>
								 @foreach($inputoutputs as $inputoutput)
									<tr>
										<td>{{ $inputoutput->created_at}}</td>
										<td>{{ $inputoutput->PerOral}}</td>
										<td>{{ $inputoutput->IV }}</td>
										<td>{{ $inputoutput->Urine }}</td>
										<td>{{ $inputoutput->Vomits }}</td>
										<td>{{ $inputoutput->Stool}}</td>
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
                     <h3 class="page-title">Add New Input/Output </h3>

                    	{!! Form::open(['method' => 'POST', 'url' => 'admin/clinics/inputoutput']) !!}
                    	<div class="row">
                			<div class="col-xs-12">
		                    	<div class="row table-responsive">
		                    		<table class="table table-bordered" id='lab'>
		                    			
		                    			<thead>
	                                           <tr>
	                                               <th>Per Oral (ml) </th>
	                                                <th>IV (ml) </th>
													<th>Urine (ml) </th>
	                                                <th>Vomits (ml) </th>
	                                                <th>Stool (ml) </th>	                                                
	                                           </tr>
	                                    </thead>
					                    <tbody>
                                            <tr>
       	                                       	<td><input type='text' name='PerOral' class='form-control'/></td>
												<td><input type='text' name='IV' class='form-control' /></td>
												<td><input type='text' name='Urine' class='form-control' /></td>
												<td><input type='text' name='Vomits' class='form-control'/></td>
												<td><input type='text' name='Stool' class='form-control'/></td>
																								
       	                                    </tr>
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
					
                  </div><!-- /inputoutput.tab-pane -->
									<div class="tab-pane" id="tab_10">                  	
											                	
																@if (count($allergies) > 0)
																	
													<div class="row table-responsive">
																			<div class="col-md-offset-1 col-xs-10">								  						  		
																	<table width='500' class="table table-bordered">
																		@foreach($allergies as $allergy)
																		<tr>
																			<td>{{ $allergy->Name }}</td>
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
                  </div><!-- /procedure.tab-pane -->
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
        </div>     

         <!-- Report Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Report</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/clinics/report']) !!}
                    		<div class="row">
				                <div class="col-md-offset-1 col-xs-8 form-group">
				                    {!! Form::label('Report ', 'Write Report*', ['class' => 'control-label']) !!}
<<<<<<< HEAD
									<textarea name='Report'> </textarea>
=======
				                    {!! Form::textarea('Report', old('Report'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				                    <p class="help-block"></p>
				                    @if($errors->has('Report'))
				                        <p class="help-block">
				                            {{ $errors->first('Report') }}
				                        </p>
				                    @endif
				                </div>				                
				                <div class="row">
					                <div class="col-md-offset-10 col-xs-2 form-group">
					                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
					                </div>
					            </div>
					            {!! Form::hidden('user_id', Auth::user()->firstname .' ' .Auth::user()->lastname ) !!}
				            	{!! Form::hidden('clinicHistory_id', $history->id) !!}
				                {!! Form::close() !!}

				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>



@stop
@section('javascript') 
<script>
<<<<<<< HEAD
// Despence Drug
	$('.dispense').on('click', function(){
		var env = window.location.host;
		if (env === "localhost") {
		  var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
		}else {
		    var baseurl = window.location.protocol + "//" + window.location.host + "/";
		}
			var quantity = prompt('Enter the quantity')
			var $this = $(this);
			console.log($(this).attr('id'))
			$.ajax({
            data: {  
                                
                    drugName: ($this).attr('name'),
                    patient_id: ($this).attr('id'),
										qty:quantity,
                    _token: '{!! csrf_token() !!}'
                    
                },		
            url: baseurl + '/admin/dispense',
						method: 'POST',
            dataType: 'json',
            success:function(data) {
							alert(data.msg)
							location.reload();
                
            } 
            
        }); 

	});

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	$('.google.btn').on('click', function(){
		var $this = $(this);
		console.log($(this).attr('name'));
     	console.log($(this).attr('id'));
		console.log($(this).attr('value'));
	   var env = window.location.host;
		if (env === "localhost") {
		  var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
		}else {
		    var baseurl = window.location.protocol + "//" + window.location.host + "/";
		}
		 $.ajax({
            data: {  
                                
                    dose: ($this).attr('name'),
                    id: ($this).attr('id'),
<<<<<<< HEAD
										section:0,
                    _token: '{!! csrf_token() !!}'
                    
                },		
=======
                    _token: '{!! csrf_token() !!}'
                    
                },
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            url: baseurl + '/admin/createDrugChart',
			method: 'POST',
            dataType: 'json',
            success:function(data) {
				//console.log(data);
                //$(this).hide();
				location.reload();
                
            } 
            
        }); 

		
});


$(':checkbox').on('change', function(e) {

	 e.preventDefault();        
     var $this = $(this);
     console.log($(this).attr('id'));
     console.log($(this).attr('name'));
     console.log($(this).val());
	   var env = window.location.host;
		if (env === "localhost") {
		  var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
		}else {
		    var baseurl = window.location.protocol + "//" + window.location.host + "/";
		}

      $.ajax({
            data: {  
                    id: $(this).attr('id'),                  
                    column: ($this).attr('name'),
                    value: $(this).val(),
                    _token: '{!! csrf_token() !!}'
                    
                },
            url: baseurl + '/admin/updatedrugchart',
            method: 'PATCH',
            dataType: 'json',
            success:function(data) {
                location.reload();
                
            } 
            
        }); 

});

<<<<<<< HEAD
		
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
								ymin:35
								

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
								ymax:200,
								ymin:40

								}); 

						   

//discontinue button
$(document).on("click", ".discontinue", function () {				
	
		
		var env = window.location.host;
		if (env === "localhost") {
		  var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
		}else {
		    var baseurl = window.location.protocol + "//" + window.location.host + "/";
		}
		 $.ajax({
            data: {                                 
                    
					id: $(this).attr('name'), 						
                    _token: '{!! csrf_token() !!}'
                    
                },		
            url: baseurl + '/admin/discontinue',
			method: 'PATCH',
            dataType: 'json',
            success:function(data) {
                location.reload();
                
            } 
            
        }); 

		
		

	});

</script>
<script>
  tinymce.init({selector:'textarea'});
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
</script>
@endsection
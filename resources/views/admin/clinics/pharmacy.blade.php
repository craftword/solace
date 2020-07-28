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
 
 <div class="row">
	  <div class="col-xs-7">
				<h3 class="page-title">Patient Clinical Histories (Pharmacy Section)</h3>
	  </div>
		<div class="col-xs-5">
	   		@if($allergies == null || count($allergies)== 0) 
				
		    @else
				<h4 style="color:red;"> Allergy Alert !!!!</h4>	
		   @endif
	   </div>
	</div>
=======
 <h3 class="page-title">Patient Clinical Histories (Pharmacy Section)</h3>

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
                  <li><a href="#tab_2" data-toggle="tab">Prescription</a></li> 
									<li><a href="#tab_3" data-toggle="tab">Allergies</a></li>          
=======
                  <li><a href="#tab_2" data-toggle="tab">Prescription</a></li>          
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                   
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                  	 @if (count($biodata) > 0)
                  	 	<div class="row">                			
                			<div class="col-md-offset-3 col-xs-8">
                        		<h1>{{ $biodata->Surname }}
		                        {{ $biodata->Firstname }}
		                        {{ $biodata->Middlename }}</h1>
		                     </div> 
                        	
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
		                    				<td><strong>State Of Origin</strong></td><td>{{ $biodata->StateOfOrigin }}</td> <td><strong>Nationality</strong></td><td>{{ $biodata->Nationality}}</td><td><strong>Registration Type</strong></td><td>{{ $biodata->RegistrationType}}</td>
		                    			</tr>
		                    			<tr>
		                    				<td><strong>Next Of Kin </strong></td><td>{{ $biodata->NextOfKin }}</td> <td><strong>Next Of Kin Phone</strong></td><td>{{ $biodata->NextOfKinPhone}}</td><td><strong>Next Of Kin Address</strong></td><td>{{ $biodata->NextOfKinAddress}}</td>
		                    			</tr>
		                    		</table>
		                    	</div>
		                    </div>
		                </div>      
                      
                        
                    @else
                    	<strong>No Records found</strong>
                     @endif
                    
                  </div><!-- /.tab-pane -->
                  
                 <div class="tab-pane" id="tab_2">                  	
                    @if (count($prescriptions) > 0)
                    
						<div class="row">
                    			<div class="col-md-offset-1 col-xs-10">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>Prescription:</strong></p>
								  		<table class="table table-bordered">
								  			@foreach ($prescriptions as $prescription)
									  			<tr>
<<<<<<< HEAD
									  				<td><strong>{{$prescription->DrugRoute}}&nbsp;&nbsp;  {{$prescription->DrugName}}&nbsp;&nbsp;  {{$prescription->DrugDose}}{{$prescription->DrugDoseUnit}} &nbsp;&nbsp;  {{$prescription->DrugFrequency}}  {{$prescription->DrugFrequencyUnit}}&nbsp;&nbsp;  {{$prescription->DrugDuration}}  {{$prescription->DrugDurationUnit}}</strong></td><td>{{date('jS F, Y',strtotime($prescription->created_at)) }} </td>
														<td><a href="#" name="{{$prescription->DrugName}}" class="btn btn-success dispense" id="{{$prescription->clinicHistory_id}}"> Add Drug Dispensed </a></td>
														
=======
									  				<td><strong>{{$prescription->DrugRoute}}&nbsp;&nbsp;  {{$prescription->DrugName}}&nbsp;&nbsp;  {{$prescription->DrugDose}}{{$prescription->DrugDoseUnit}} &nbsp;&nbsp;  {{$prescription->DrugFrequency}} X {{$prescription->DrugFrequencyUnit}}&nbsp;&nbsp;  {{$prescription->DrugDuration}} X {{$prescription->DrugDurationUnit}}</strong></td><td>{{date('jS F, Y',strtotime($prescription->created_at)) }} </td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
									  			</tr>
								  			@endforeach
								  		</table>
								  		
								  	</div>
								  </div>
								</div>		  	
								
							</div>
                    @else
                    	<h2> No Records yet !! </h2>
                    @endif
                    
                  </div><!-- /.tab-pane -->
<<<<<<< HEAD
									<div class="tab-pane" id="tab_3">                  	
											                	
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
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
        </div>     
<<<<<<< HEAD
       

@stop
@section('javascript') 
<script>
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
</script>
@endsection
=======

         

@stop
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

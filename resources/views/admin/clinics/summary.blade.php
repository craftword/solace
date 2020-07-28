@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
<<<<<<< HEAD
	@if($nav == 'no')
    <li class="breadcrumb-item"><a href="{{ route('admin.patients.waiting_patients') }}">Waiting Patients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Past Histories</li>
	@else 
		<li class="breadcrumb-item active" aria-current="page">Past Histories</li>
	@endif
=======
    <li class="breadcrumb-item"><a href="{{ route('admin.patients.waiting_patients') }}">Waiting Patients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Summary</li>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
  </ol>
</nav>
<div class="row"> 
	<div class="row">              			
<<<<<<< HEAD
	    <div class="col-md-offset-3 col-xs-8">
	         <h1>{{ $biodata->Surname }}
			     {{ $biodata->Firstname }}
			     {{ $biodata->Middlename }}</h1>
		</div>
		
=======
	    <div class="col-md-offset-1 col-xs-8">
	         <h2>{{ $biodata->Surname }}
			     {{ $biodata->Firstname }}
			     {{ $biodata->Middlename }}</h2>
		</div> 

		<div class="col-xs-3">
			Date: {{date('jS F, Y',strtotime($history->created_at))}}
	    </div>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	</div> 
	<div class="row"> 
		<div class="col-md-offset-1 col-xs-3">
			<strong>Sex:</strong> {{ $biodata->Sex }}
		</div>
		<div class="col-xs-3">
			<strong>Age:</strong> @if ($biodata->age > 5)
									{{ $biodata->age }} years
								  @else 
								  	{{ $biodata->month }} months
								  @endif
		</div>
		<div class="col-xs-3">
			<strong>Registration Type:</strong> {{ $biodata->RegistrationType }}
		</div>
		
	</div>
</div>
<p>  </p>
<<<<<<< HEAD

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
	        <div class="panel-body">
<<<<<<< HEAD
			  <p><strong>Past Histories</strong></p>
				 @if (count($histories) > 0)
				 		@foreach($histories as $history)
							<a href="#" class="btn btn-primary" id="{{$history->id}}"> {{date('jS F, Y',strtotime($history->created_at))}} </a> </button>
						@endforeach
				   	 	
				   	 @else
						<h2> No Record !! </h2>
					@endif
			
=======
			  <p><strong>Vitals Sign:</strong></p>
				<table class="table table-bordered" cellpadding="2">
					@if (empty($vitalsigns))
				   	 	<h2> No Record !! </h2>
				   	 @else
						@foreach ($vitalsigns as $vitalsign)
						<tr>
							<td><strong>Temp</strong></td><td>{{ $vitalsign->Temperature }}  Celcius</td><td><strong>Blood Pressure</strong></td><td>{{ $vitalsign->BloodPressure  }} mm/Hg</td><td><strong>Weight</strong></td><td>{{ $vitalsign->Weight }} Kg</td><td><strong>Pulse Rate</strong></td><td>{{ $vitalsign->PulseRate }} Beats/min</td>
						</tr>
						 @endforeach
					@endif
				</table>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
			</div>
		</div>
	</div>

</div>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
	        <div class="panel-body">
			  <p><strong>Clinical History:</strong></p>
<<<<<<< HEAD
				<table class="table table-bordered history" cellpadding="2">
					
=======
				<table class="table table-bordered" cellpadding="2">
					<tr>
						<td><strong>Presenting Complaint</strong></td><td>{{ $history->PresentingComplaint }}  </td><td><strong>History PC</strong></td><td>{{ $history->HistoryPC  }} </td>
					</tr>
					<tr>
						<td><strong>Family History</strong></td><td>{{ $history->FamilyHistory }}  </td><td><strong>Social History</strong></td><td>{{ $history->SocialHistory  }} </td>
					</tr>
					<tr>
						<td><strong>Past Medical History</strong></td><td>{{ $history->PastMedicalHistory }}  </td><td><strong>Past Surgical History</strong></td><td>{{ $history->PastSurgicalHistory }} </td>
					</tr>
					<tr>
						<td><strong>Drug History</strong></td><td>{{ $history->DrugHistory }}  </td><td><strong>Allergy History</strong></td><td>{{ $history->AllergyHistory }} </td>
					</tr>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				</table>
			</div>
		</div>
	</div>

</div>
<<<<<<< HEAD
=======

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
	        <div class="panel-body">
			  <p><strong>Examination:</strong></p>
<<<<<<< HEAD
				   <table class="table table-bordered exam" cellpadding="2">
				   	 
=======
				   <table class="table table-bordered" cellpadding="2">
				   	 @if (empty($examination))
				   	 	<h2> No Record !! </h2>
				   	 @else
						<tr>
							<td><strong>General Physical</strong></td><td>{{ $examination->GeneralPhysical }}  </td><td><strong>Cardiovascular</strong></td><td>{{ $examination->Cardiovascular  }} </td>
						</tr>
						<tr>
							<td><strong>Neurologic</strong></td><td>{{ $examination->Neurologic }}  </td><td><strong>Musculoskeletal</strong></td><td>{{ $examination->Musculoskeletal  }} </td>
						</tr>
						<tr>
							<td><strong>Respiratory</strong></td><td>{{ $examination->Respiratory }}  </td><td><strong>Abdomial</strong></td><td>{{ $examination->Abdomial }} </td>
						</tr>
						<tr>
							<td><strong>MentalState</strong></td><td>{{ $examination->MentalState }}  </td><td><strong>ENT</strong></td><td>{{ $examination->ENT }} </td>
						</tr>
						<tr>
							<td><strong>Eye</strong></td><td>{{ $examination->Eye }}  </td><td><strong>Dental</strong></td><td>{{ $examination->Dental }} </td>
						</tr>
						<tr>
							<td><strong>Chest</strong></td><td>{{ $examination->Chest }}  </td><td><strong>Neck</strong></td><td>{{ $examination->Neck }} </td>
						</tr>
					@endif
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				</table>
			</div>
		</div>
	</div>
<<<<<<< HEAD
=======

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
	        <div class="panel-body">
<<<<<<< HEAD
			  <p><strong>Management:</strong></p>
				   <table class="table table-bordered manage" cellpadding="2">
				   	 
=======
			  <p><strong>Procedure:</strong></p>
				    <table class="table table-bordered" cellpadding="2">
				    	 @if (empty($procedures))
				   	 		<h2> No Record !! </h2>
				   		 @else
						    @foreach ($procedures as $procedure)
						    	<tr>
								  	 <td><strong>Name:</strong></td><td>{{$procedure->Name }} </td><td><strong>Cost:</strong> </td><td>{{$procedure->Cost }} </td>
								 </tr>
						    @endforeach
						@endif
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				</table>
			</div>
		</div>
	</div>
<<<<<<< HEAD
=======

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
	        <div class="panel-body">
<<<<<<< HEAD
			  <p><strong>Diagnosis:</strong></p>
				   <table class="table table-bordered diagnose" cellpadding="2">
				   	 
				</table>
			</div>
		</div>
	</div>
</div>	
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
	        <div class="panel-body">
			  <p><strong>Prescription:</strong></p>
				   <table class="table table-bordered precript" cellpadding="2">
				   	 
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
	        <div class="panel-body">
			  <p><strong>Laboratory:</strong></p>
				   <table class="table table-bordered lab" cellpadding="2">
				   	 
				</table>
			</div>
		</div>
	</div>
</div>
@if($biodata->Sex == 'Female' & $biodata->age > 12 )
<div class="row ">
	<div class="col-xs-12">
		<div class="panel panel-primary">
	        <div class="panel-body">
			  <p><strong>Post Delivery Note:</strong></p>
				   <table class="table table-bordered delivery" cellpadding="2">
				   	 
=======
			  <p><strong>Prescription:</strong></p>
				    <table class="table table-bordered" cellpadding="2">
				    	 @if (empty($prescriptions))
				   	 		<h2> No Record !! </h2>
				   		 @else
						    @foreach ($prescriptions as $prescription)
						    <tr>
						    	<td><p><strong>{{ $prescription->created_at }}</strong></p></td>
						    </tr>
							<tr>
								<td><strong>Drug Route</strong></td><td>{{ $prescription->DrugRoute }}</td><td><strong>DrugName</strong></td><td>{{ $prescription->DrugName }}</td><td><strong>Drug Dose</strong></td><td>{{ $prescription->DrugDose}} {{ $prescription->DrugDoseUnit }}</td><td><strong>Drug Frequency</strong></td><td>{{ $prescription->DrugFrequency}} {{ $prescription->DrugFrequencyUnit }}</td><td><strong>DrugDuration</strong></td><td>{{ $prescription->DrugDuration}} {{ $prescription->DrugDurationUnit }}</td>
							</tr>					
							
							@endforeach
						@endif
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				</table>
			</div>
		</div>
	</div>
<<<<<<< HEAD
</div>
@endif
=======

</div>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
	        <div class="panel-body">
<<<<<<< HEAD
			  <p><strong>Operation Note:</strong></p>
				   <table class="table table-bordered operation" cellpadding="2">
				   	 
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row">                			
    <div class="col-md-offset-7 col-xs-5 name">
    	
		     
	</div> 
</div>												
@stop
@section('javascript') 
<script>
	$('.btn').on('click', function(e) {
        e.preventDefault();	
		var env = window.location.host;
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }
		  $.ajax({
            data: {  
                    id:$(this).attr('id'),
                    _token: '{!! csrf_token() !!}'
                    
                },
            url: baseurl + '/admin/viewPastHistory',
            method: 'GET',
            dataType: 'json',
            success:function(data) {
               
				// history
				console.log(data[0]);
				if ( data[0].PresentingComplaint != null) {
					$('.history').empty();
					$('.name').empty();					
					$('.history').append("<tr><td>" + data[0].PresentingComplaint+  "</td></tr>");
					$('.name').append("<strong>Name of Doctor:</strong>" +data[0].user_name+ "");
													
				}
				else {
					const vitals = "<h2> No Record !! </h2>";
					$('.history').empty();
					$('.history').append(vitals);
				}
				// examination
				console.log(data[1]);
				if (data[1]) {
					$('.exam').empty();					
					$('.exam').append("<tr><td>" + data[1].GeneralPhysical+  "</td></tr>");
													
				}
				else {
					const vitals = "<h2> No Record !! </h2>";
					$('.exam').empty();
					$('.exam').append(vitals);
				}
				// management
				if (data[2].length > 0) {
					$('.manage').empty();
					$.each(data[2], function (i, d){
						$('.manage').append("<tr><td>" + d.Management+  "</td></tr>");
					});	
									
				}
				else {
					const vitals = "<h2> No Record !! </h2>";
					$('.manage').empty();
					$('.manage').append(vitals);
				}
				// diagnose
				if (data[3].length > 0) {
					$('.diagnose').empty();
					$.each(data[3], function (i, d){
						$('.diagnose').append("<tr><td>" + d.Diagnosis+  "</td></tr>");
					});	
									
				}
				else {
					const vitals = "<h2> No Record !! </h2>";
					$('.diagnose').empty();
					$('.diagnose').append(vitals);
				}
				
				//Precription 	
				if (data[5].length > 0) {
					$('.precript').empty();
					$.each(data[5], function (i, d){
						$('.precript').append("<tr><td><p><strong>"+ d.created_at+ "</strong></p></td></tr><tr><td><strong>Drug Route</strong></td><td>"+d.DrugRoute+"</td><td><strong>DrugName</strong></td><td>"+ d.DrugName+"</td><td><strong>Drug Dose</strong></td><td>"+d.DrugDose+ d.DrugDoseUnit+ "</td><td><strong>Drug Frequency</strong></td><td>" +d.DrugFrequency+ d.DrugFrequencyUnit+ "</td><td><strong>DrugDuration</strong></td><td>" +d.DrugDuration+ d.DrugDurationUnit+ "</td></tr>");
					});	
									
				}
				else {
					const vitals = "<h2> No Record !! </h2>";
					$('.precript').empty();
					$('.precript').append(vitals);
				}
				//lab	
				if (data[6].length > 0) {
					$('.lab').empty();
					$.each(data[6], function (i, d){
						$('.lab').append("<tr><td>" +d.LabTestName+ "</td><td>" +d.Result+ "</td><td>" +d.Reference+ "</td></tr>");     	
						                  		
						    
					});	
									
				}
				else {
					const vitals = "<h2> No Record !! </h2>";
					$('.lab').empty();
					$('.lab').append(vitals);
				}

				// Post delivery
				if (data[7].length > 0) {
					$('.delivery').empty();
					$.each(data[7], function (i, d){
						$('.delivery').append("<tr><td>" +d.MOD+ "</td><td>" +d.PD+ "</td><td>" +d.DrugGiven+ "</td><td>" +d.APGAR+ "</td><td>" +d.BW+ "</td><td>" +d.Length+ "</td><td>" +d.PDN+ "</td><td>" +d.Complication+ "</td><td>" +d.EBL+ "</td></tr>");     	
						                  		
						    
					});	
									
				}
				else {
					const vitals = "<h2> No Record !! </h2>";
					$('.delivery').empty();
					$('.delivery').append(vitals);
				}
				// Operation Note
				
				if (data[8].length > 0) {
					$('.operation').empty();
					$.each(data[8], function (i, d){
						
						$('.operation').append("<tr><td>" +d.note+ "</td></tr>");     	
						                  		
						    
					});	
									
				}
				else {
					const vitals = "<h2> No Record !! </h2>";
					$('.operation').empty();
					$('.operation').append(vitals);
				}
            } 
            
        }); 
		
	});

</script>
@endsection
=======
			  <p><strong>Laboratory Test:</strong></p>
				 <table class="table table-bordered" cellpadding="2">
				    	 @if (empty($laboratory))
				   	 		<h2> No Record !! </h2>
				   		 @else 
				   		 	@foreach($laboratories as $laboratory)
				   		 	<tr>
						        <td>{{$laboratory->LabTestName }}</td><td>{{$laboratory->Result }}</td><td>{{$laboratory->Reference }}</td>                  	
						                    		
						    </tr>         	
						    @endforeach

				  		 @endif
				</table>		   
			</div>
		</div>
	</div>

</div>

<div class="row">                			
    <div class="col-md-offset-7 col-xs-5">
    	<strong>Name of Doctor:</strong> {{ $history->user_name }}
		     
	</div> 
</div>

	
@stop
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

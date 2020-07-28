@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">    
    <li class="breadcrumb-item"><a href="{{ URL::to('admin/clinics/nurse/'.$id) }}">Back to Nurse Section</a></li>
    <li class="breadcrumb-item active" aria-current="page">Antenatal Section</li>
  </ol>
</nav>
 <h3 class="page-title">Antenatal Section </h3>
	 @if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
			</div>
	@endif
		 <!-- /.success pane -->
         <!-- START CUSTOM TABS -->
        <div class="row">
            <div class="col-md-12">            	
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Antenatal </a></li>
<<<<<<< HEAD
                  <li><a href="#tab_2" data-toggle="tab">Antenatal Visits</a></li>
				  <li><a href="#tab_3" data-toggle="tab">Prescription</a></li>                            
=======
                  <li><a href="#tab_2" data-toggle="tab">Antenatal Visits</a></li>                            
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                     
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">                
                  		
					<div class="row">              			
                        <div class="col-md-offset-1 col-xs-5">
                            <h3>{{ $biodata->Surname }}
                                {{ $biodata->Firstname }}
                                {{ $biodata->Middlename }}</h3>
                        </div> 

                        <div class="col-xs-3">
                            Age: {{ $biodata->age }}
                        </div>
                        <div class="col-xs-3">
                            Date Of Booking: @if (count($antenatals) > 0) {{ date('jS F, Y',strtotime($antenatals[0]->DateOfBooking)) }} @else {{date('d-m-Y')}} @endif
                        </div>
                    </div> 
				                     				                  	
                    @if (count($antenatals) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			@foreach($antenatals as $antenatal)
								  			<tr>
								  				<td><strong>Last Menstrual Period</strong></td><td>{{ date('jS F, Y',strtotime($antenatal->LMP)) }}</td>
			                    				<td><strong>Expected Day Of Delivery</strong></td><td>{{ date('jS F, Y',strtotime($antenatal->edd)) }}</td>
                                                <td><strong>Estimated Gestation Age</strong></td><td>{{ $antenatal->ega}} Weeks</td>
								  			</tr>
                                            <tr>
								  				<td><strong>Gravity</strong></td><td>{{ $antenatal->Gravity}}</td>
			                    				<td><strong>Parity</strong></td><td>{{ $antenatal->Parity}}</td>
                                                <td><strong>Number Of live Birth</strong></td><td>{{ $antenatal->NumberOfliveBirth}}</td>
								  			</tr>
                                            <tr>
								  				<td><strong>Number Of Abortion</strong></td><td>{{ $antenatal->NumberOfAbortion}}</td>
			                    				
								  			</tr>
								  			@endforeach
								  		</table>`
								  		
								  	</div>		  	
								
							</div>
                            <div class="row">
                    			<div class="col-xs-12">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>Present Pregnancy History:</strong></p>
								  		{{ $antenatal->PresentPregnancyHistory}}
								  	</div>
								  </div>
								</div>
                            </div>
                            <div class="row">
							  	<div class="col-xs-12">
								  <div class="panel panel-success">
								  	<div class="panel-body">
								  		<p><strong>	Past Obstetric History :</strong></p>
								  			{{ $antenatal->PastObstetricHistory}} 
								  	</div>
								  </div>
								</div>
                            </div>
                            <div class="row">
								<div class="col-xs-12">
								  <div class="panel panel-danger">
								  	<div class="panel-body">
								  		<p><strong>	Special Instruction:</strong></p>
								  			{{ $antenatal->SpecialInstruction}}
								  	</div>
								  </div>
								</div>
							</div>                  		
                  		
                    @else
                   <h2> No record found </h2>
                    @endif
                  </div><!-- /Antenatal .tab-content -->
                  <div class="tab-pane" id="tab_2">                   	    
					      @if (count($antenatalvisits) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			<thead>
	                                           <tr>
	                                                <th>Date </th>
<<<<<<< HEAD
	                                                <th>Height of Fundus </th>
=======
	                                                <th>Height of Funds </th>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	                                                <th>Presentation and Position</th>
	                                                <th>Relation Of Presenting Part To BRIM </th>
	                                                <th>Urine For Protein </th>
                                                    <th>PCV </th>
                                                    <th>Filter Heart Rate </th>
	                                                <th>Weight </th>
	                                                <th>Blood Pressure</th>
                                                    <th>Remark</th>
	                                           </tr>
	                                        </thead>
	                                        <tbody>
									  			@foreach($antenatalvisits as $antenatalvisit)
									  			<tr>
									  				<td>{{ $antenatalvisit->created_at }}</td>
	                                                <td>{{$antenatalvisit->HOF}}</td>
	                                                <td>{{$antenatalvisit->PAP}}</td>
	                                                <td>{{$antenatalvisit->ROPPTB}}</td>
	                                                <td>{{$antenatalvisit->UFP}}</td>
                                                    <td>{{$antenatalvisit->PCV}}</td>
                                                    <td>{{$antenatalvisit->FHR}}</td>
	                                                <td>{{$antenatalvisit->Weight}}</td>
	                                                <td>{{$antenatalvisit->BP}}</td>
                                                    <td>{{$antenatalvisit->Remark}}</td>
									  			</tr>
									  			@endforeach
								  			</tbody>
								  		</table>`
								  		
								  	</div>		  	
								
							</div>
                    
                  		
                    @else
                   
<<<<<<< HEAD
                      <h4> No record found </h4>

                    @endif
					<p> </p>
					<hr />
                     <h3> Add Antenatal Visits </h3>
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/antenatal/visits']) !!}
                    	<div class="row">
                			<div class="col-md-offset-1 col-xs-10">
		                    	<div class="row table-responsive">
		                    		<table class="table table-bordered" id='lab'>
		                    			
		                    			<thead>
	                                           <tr>
	                                                <th>Urine For Protein </th>
                                                    <th>PCV </th>
                                                    <th>Weight </th>
	                                                <th>Blood Pressure</th>
                                                                                                    
	                                           </tr>
	                                    </thead>
					                    <tbody>
                                            <tr>
       	                                       <td><input type='text' name='UFP' class='form-control'/></td><td><input type='text' name='PCV' class='form-control'/></td><td><input type='text' name='Weight' class='form-control'/></td><td><input type='text' name='BP' class='form-control'/></td>
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
					            
				            	{!! Form::hidden('clinicHistory_id', $id) !!}
				                {!! Form::close() !!}                  	                  

                  </div><!-- /Antenatal visit .tab-content -->
                  
             	<div class="tab-pane" id="tab_3"> 
    				<div id="field" data-field-id="{{$prescriptions}}" ></div>              	
                  		@if (count($prescriptions) > 0)                   
						
							<div class="row">
                    			<div class="col-md-offset-1 col-xs-11">
								  
								  		<table class="table table-bordered">
								  			@foreach ($prescriptions as $prescription)
									  			<tr>
									  				<td><strong>{{$prescription->DrugRoute}}&nbsp;&nbsp;  {{$prescription->DrugName}}&nbsp;&nbsp;  {{$prescription->DrugDose}}{{$prescription->DrugDoseUnit}} &nbsp;&nbsp;  {{$prescription->DrugFrequency}}  {{$prescription->DrugFrequencyUnit}}&nbsp;&nbsp; X {{$prescription->DrugDuration}}  {{$prescription->DrugDurationUnit}}</strong></td>
													<td>{{date('jS F, Y',strtotime($prescription->created_at)) }} </td>
													<td><a href="#" name="{{$prescription->DrugName}}" class="btn btn-primary google" id="{{$prescription->clinicHistory_id}}" >
														Add New Day
														</a> 
													</td>
									  			</tr>
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
                  </div><!-- /prescription tab-pane -->
=======
                    	<h3> No record found </h3>

                    @endif
                                       

                  </div><!-- /Antenatal visit .tab-content -->
                  
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
             	 </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
        </div>     

<<<<<<< HEAD
@stop
@section('javascript') 
<script>
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
                    section:2,
                    _token: '{!! csrf_token() !!}'
                    
                },
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

</script>
@endsection
=======

@stop

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

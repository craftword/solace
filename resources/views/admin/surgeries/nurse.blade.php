@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">    
    <li class="breadcrumb-item"><a href="{{ URL::to('admin/clinics/nurse/'.$id) }}">Back to Nurse Section</a></li>
    <li class="breadcrumb-item active" aria-current="page">Surgery Section</li>
  </ol>
</nav>
 <h3 class="page-title">Surgery Nurse Section </h3>
	 @if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
			</div>
	@endif
<<<<<<< HEAD
		@if (count($chartintraoperatives) > 0)
	<div class="row">
		<div class="col-xs-6">
		     <div class="panel panel-default">
			    <div class="panel-heading">
                     Blood Pressure Graph 
				</div>
					<div class="panel-body">
					     <div id="operative1"> </div>
						 
					</div>
					<p> </p>
					SBP: <button class="btn btn-danger"> </button> | DBP: <button class="btn btn-success"> </button> |  BLOOD PH: <button class="btn btn-primary"> </button>
				</div>
			</div>
			<div class=" col-xs-6">
		     <div class="panel panel-default">
			    <div class="panel-heading">
                     Intra-Operartive Graph 
				</div>
					<div class="panel-body">
					     <div id="operative2"> </div>
						 
					</div>
					<p> </p>
					Heart Rate: <button class="btn btn-primary"> </button> |Respiratory Rate: <button class="btn btn-warning"> </button> | CO2: <button class="btn btn-success"> </button>
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
                  <li class="active"><a href="#tab_1" data-toggle="tab">Pre Operative Review</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Intra Operative Chart</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Operative Note </a></li>
                  <li><a href="#tab_4" data-toggle="tab">Post Operative Review</a></li>
<<<<<<< HEAD
                  <li><a href="#tab_5" data-toggle="tab">Post Operative Order</a></li>  
									<li><a href="#tab_6" data-toggle="tab">Prescription</a></li>                
=======
                  <li><a href="#tab_5" data-toggle="tab">Post Operative Order</a></li>                  
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                     
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">                  
                  			
					                      				                  	
                    @if (count($preoperatives) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			@foreach($preoperatives as $preoperative)
								  			<tr>
								  				<td>{{ $preoperative->review}}</td>
			                    				<td>{{ date('jS F, Y',strtotime($preoperative->created_at))}}</td>
								  			</tr>
								  			@endforeach
								  		</table>`
								  		
								  	</div>		  	
								
							</div>                  		
                  		
                    @else
                    <h2> No record found </h2>

                    @endif
                  </div><!-- /Pre .tab-content -->
                  <div class="tab-pane" id="tab_2">                   	    
					                      				                  	
                    @if (count($intraoperatives) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			<thead>
	                                           <tr>
	                                                <th>Date / Time </th>
													<th>Blood Pressure </th>
	                                                <th>Respiratory Rate </th>
	                                                <th>Heart Rate </th>
	                                                <th>CO2 </th>
	                                                <th>O2 </th>
	                                                <th>Blood PH </th>
	                                                
	                                           </tr>
	                                        </thead>
	                                        <tbody>
									  			@foreach($intraoperatives as $intraoperative)
									  			<tr>
<<<<<<< HEAD
									  				<td><textarea>{{$intraoperative->created_at}}</textarea></td>
													<td>{{$intraoperative->SBP}} / {{$intraoperative->DBP}}</td>
=======
									  				<td>{{$intraoperative->created_at}}</td>
													<td>{{$intraoperative->BloodPressure}}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	                                                <td>{{$intraoperative->RespiratoryRate}}</td>
	                                                <td>{{$intraoperative->HeartRate}}</td>
	                                                <td>{{$intraoperative->CO2}}</td>
	                                                <td>{{$intraoperative->O2}}</td>
	                                                <td>{{$intraoperative->BloodPH}}</td>
	                                            </tr>
									  			@endforeach   
								  			</tbody>
								  		</table>`
								  		
								  	</div>		  	
								
							</div>
                    
                  		
                    @else
                   
                    	<h3> No record found </h3>

                    @endif
                   
                  </div><!-- /Intra .tab-content -->
                  <div class="tab-pane" id="tab_3">
				  		
				  		@if (count($operatives) > 0)
						  	<div class="row">
                    			<div class="col-md-offset-1 col-md-10">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>Note:</strong></p>
<<<<<<< HEAD
								  		<p><textarea>{{$operatives[0]->note}}</textarea> </p>
=======
								  		<p>{{$operatives[0]->note}} </p>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
								  	</div>
								  </div>
								</div>
							</div>
						@else
							<h2> No Record </h2>
						@endif

                  </div><!-- /Ope.tab-content -->
                  <div class="tab-pane" id="tab_4">                       					
				                      				                  	
                    @if (count($postoperatives) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			@foreach($postoperatives as $postoperative)
								  			<tr>
<<<<<<< HEAD
								  				<td><textarea>{{ $postoperative->review}}</textarea></td>
=======
								  				<td>{{ $postoperative->review}}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
			                    				<td>{{ date('jS F, Y',strtotime($postoperative->created_at))}}</td>
								  			</tr>
								  			@endforeach
								  		</table>`
								  		
								  	</div>		  	
								
							</div>                  		
                  		
                    @else
                    <h2> No record found </h2>

                    @endif
                  

                  </div><!-- /Post.tab-content -->

                  <div class="tab-pane" id="tab_5">                                       				                  	
                    @if (count($postoperativeorders) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			@foreach($postoperativeorders as $postoperativeorder)
								  			<tr>
<<<<<<< HEAD
								  				<td><textarea>{{ $postoperativeorder->order}}</textarea></td>
=======
								  				<td>{{ $postoperativeorder->order}}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
			                    				<td>{{ date('jS F, Y',strtotime($postoperativeorder->created_at))}}</td>
								  			</tr>
								  			@endforeach
								  		</table>`
								  		
								  	</div>		  	
								
							</div>                  		
                  		
                    @else
                    <h2> No record found </h2>

                    @endif

                  </div><!-- /Order.tab-content -->
<<<<<<< HEAD
			<div class="tab-pane" id="tab_6"> 
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
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
             	 </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
        </div>     

@stop
<<<<<<< HEAD
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
                    section:1,
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
	<script>	
							  	//Vital Sign Chart
								var data = {!! $chartintraoperatives !!};
								console.log(data);
								var arr1 = [];
								var arr2 = [];
								var sbp = 0;
								var dbp = 0;
								var resp = 0;
								var pulse = 0;
								var ph = 0;
								var o2 = 0;

								$.each(data, function (i, d){
								if(d.SBP === null) {
									sbp = sbp;
								}else {
									sbp = parseInt(d.SBP);
								}
								if(d.DBP === null) {
									dbp = dbp;
								}else {
									dbp = parseInt(d.DBP);
								}
								if(d.HeartRate === null) {
									pulse = pulse;
								}else {
									pulse = parseInt(d.HeartRate);
								}
								if(d.RespiratoryRate === null) {
									resp = resp;
								}else {
									resp = parseInt(d.RespiratoryRate);
								}
								if(d.BloodPH === null) {
									ph = ph;
								}else {
									ph = parseInt(d.BloodPH);
								}
								if(d.O2 === null) {
									o2 = o2;
								}else {
									o2 = parseInt(d.O2);
								}
								
								arr1.push({v:d.created_at, w:sbp, x:dbp, y:ph });
								arr2.push({v:d.created_at, y:pulse, z:resp, x:o2 });

								});

								

								Morris.Line({
								element: 'operative1',
								data: arr1,
								xkey: 'v',
								ykeys: ['w', 'x', 'y'],
								labels: ['SPB', 'DBP', 'BloodPH'],
								parseTime:false,
								lineColors: ['#FF0000', '#6B8E23', '#0000FF'],
								lineWidth: 2,
								

								}); 

								Morris.Line({
								element: 'operative2',
								data: arr2,
								xkey: 'v',
								ykeys: ['y', 'z', 'x'],
								labels: ['HeartRate', 'Respiratory', 'Saturation Oxygen'],
								parseTime:false,
								lineColors: ['#0000FF', '#FFFF00', '#6B8E23'],
								lineWidth: 2,
								ymax: 180,
                                ymin: 10,
								}); 

						    </script>
								<script>
  tinymce.init({selector:'textarea'});
</script>
@endsection
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35


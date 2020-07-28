@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">    
    <li class="breadcrumb-item"><a href="{{ URL::to('admin/clinics/doctor/'.$id) }}">Back to Doctor Section</a></li>
    <li class="breadcrumb-item active" aria-current="page">Labour Section</li>
  </ol>
</nav>
 <h3 class="page-title">Labour Monitor Doctor Section </h3>
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
                  <li class="active"><a href="#tab_1" data-toggle="tab">Labour </a></li>
                  <li><a href="#tab_2" data-toggle="tab">Fetormaternal Vital Signs</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Doctors Reviews</a></li>
<<<<<<< HEAD
                  <li><a href="#tab_4" data-toggle="tab">Post Delivery</a></li> 
				  <li><a href="#tab_5" data-toggle="tab">Prescription</a></li>            
				  <li><a href="{{ url('admin/charts/index') }}">Partograph</a></li>                                      
=======
                  <li><a href="#tab_4" data-toggle="tab">Post Delivery</a></li>                           
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                     
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">                
                  									                  	
                    @if (count($labours) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			@foreach($labours as $labour)
								  			<tr>
								  				<td><strong>Time Of Arrival</strong></td><td>{{ date('jS F, Y',strtotime($labour->TimeOfArrival)) }}</td>
			                    				<td><strong>Caput</strong></td><td>{{ $labour->Caput}}</td>
                                                <td><strong>Moulding</strong></td><td>{{ $labour->Moulding}}</td>
								  			</tr>
                                            <tr>
								  				<td><strong>Liquor</strong></td><td>{{ $labour->Liquor}}</td>
			                    				<td><strong>Pelvimetry</strong></td><td>{{ $labour->Pelvimetry}}</td>
                                        	</tr>
                                            
								  			@endforeach
								  		</table>`
								  		
								  	</div>		  	
								
							</div>
                            
                  		
                    @else
                    <h3 class="page-title">Add Labour History </h3>
                  		{!! Form::open(['method' => 'POST', 'url' => 'admin/labour/labour']) !!}

                  			<div class="row">
				                <div class="col-xs-4 form-group">
                                    {!! Form::label('TimeOfArrival', 'Time Of Arrival*', ['class' => 'control-label']) !!}
                                    {!! Form::date('TimeOfArrival', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('TimeOfArrival'))
                                        <p class="help-block">
                                            {{ $errors->first('TimeOfArrival') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
				                <div class="col-xs-4 form-group">
                                    {!! Form::label('Caput', 'Caput *', ['class' => 'control-label']) !!}
                                        {!! Form::text('Caput', old('Caput'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('Caput'))
                                            <p class="help-block">
                                                {{ $errors->first('Caput') }}
                                            </p>
                                        @endif 
                                </div>
                                <div class="col-xs-4 form-group">
                                    {!! Form::label('Moulding', 'Moulding *', ['class' => 'control-label']) !!}
                                        {!! Form::text('Moulding', old('Moulding'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('Moulding'))
                                            <p class="help-block">
                                                {{ $errors->first('Moulding') }}
                                            </p>
                                        @endif 
                                </div>
				            </div>
                            <div class="row">
				                <div class="col-xs-6 form-group">
                                    {!! Form::label('Liquor', 'Liquor *', ['class' => 'control-label']) !!}
                                        {!! Form::text('Liquor', old('Liquor'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('Liquor'))
                                            <p class="help-block">
                                                {{ $errors->first('Liquor') }}
                                            </p>
                                        @endif 
                                </div>
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('Pelvimetry', '	Pelvimetry *', ['class' => 'control-label']) !!}
                                        {!! Form::text('Pelvimetry', old('Pelvimetry'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('Pelvimetry'))
                                            <p class="help-block">
                                                {{ $errors->first('Pelvimetry') }}
                                            </p>
                                        @endif 
                                </div>
				            </div>
                           <div class="row">
				                <div class="col-md-offset-10 col-xs-2 form-group">
				                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
				                </div>
				            </div>

                  		{!! Form::hidden('clinicHistory_id', $id) !!}

                    	{!! Form::close() !!}	 
                    @endif
                  </div><!-- /labour .tab-content -->
                  <div class="tab-pane" id="tab_2">                   	    
					      @if (count($signs) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			<thead>
	                                           <tr>
	                                                <th>Date </th>
	                                                <th>Fetal Heart Rate </th>
	                                                <th>Blood Pressure </th>
	                                                <th>Contraction</th>
                                                    <th>Descent Of The Head</th>
                                                    <th>Cervical Dilatation </th>
	                                                <th>Cervical Effacement </th>
	                                                
	                                           </tr>
	                                        </thead>
	                                        <tbody>
									  			@foreach($signs as $sign)
									  			<tr>
<<<<<<< HEAD
									  				<td>{{$sign->created_at}}</td>
=======
									  				<td>{{date('jS F, Y',strtotime($sign->created_at))}}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	                                                <td>{{$sign->FHR}}</td>
	                                                <td>{{$sign->BP}}</td>
	                                                <td>{{$sign->Contraction}}</td>
	                                                <td>{{$sign->DOTH}}</td>
                                                    <td>{{$sign->CD}}</td>
                                                    <td>{{$sign->CE}}</td>
	                                               
									  			</tr>
									  			@endforeach
								  			</tbody>
								  		</table>`
								  		
								  	</div>		  	
								
							</div>
                    
                  		
                    @else
                   
                    	<h3> No record found </h3>

                    @endif                                  				                  	
                    </div><!-- /labour vital sign .tab-content -->
                  <div class="tab-pane" id="tab_3">
                         <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#review">
						  Add New Review
						</button>
					
<<<<<<< HEAD
					                       				                  	
=======
					<p> </p>                        				                  	
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    @if (count($reviews) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			@foreach($reviews as $review)
								  			<tr>
<<<<<<< HEAD
								  				<td><textarea>{{ $review->review}}</textarea></td>
			                    				<td>{{ $review->created_at }}</td>
=======
								  				<td>{{ $review->review}}</td>
			                    				<td>{{ date('jS F, Y',strtotime($review->created_at))}}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
								  			</tr>
								  			@endforeach
								  		</table>`
								  		
								  	</div>		  	
								
							</div>                  		
                  		
                    @else
                    <h2> No record found </h2>

                    @endif
                  </div><!-- /doctor review .tab-content -->

                  <div class="tab-pane" id="tab_4">
                     @if (count($postdeliveries) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			@foreach($postdeliveries as $postdelivery)
								  			<tr>
								  				<td><strong>Mode Of Delivery</strong></td><td>{{$postdelivery->MOD }}</td>
			                    				<td><strong>Placenta Delivery</strong></td><td>{{ $postdelivery->PD}}</td>
                                                <td><strong>Estimated Blood Loss</strong></td><td>{{ $postdelivery->EBL}}</td>
                                                
								  			</tr>
                                            <tr>
								  				<td><strong>APGAR Score</strong></td><td>{{ $postdelivery->APGAR}}</td>
			                    				<td><strong>Birth Weight</strong></td><td>{{ $postdelivery->BW}}</td>
                                                <td><strong>Lenght</strong></td><td>{{ $postdelivery->lenght}}</td>
                                        	</tr>
                                            <tr>
								  				<td><strong>Complication</strong></td><td colspan='6'>{{ $postdelivery->Complication}}</td>
                                            </tr>
			                    				<td><strong>Drug Given</strong></td><td colspan='6'>{{ $postdelivery->DrugGiven}}</td>
                                            </tr>
                                                <td><strong>Post Delivery Note</strong></td><td colspan='6'>{{ $postdelivery->PDN}}</td>
                                        	</tr>
                                            
								  			@endforeach
								  		</table>
								  		
								  	</div>		  	
								
							</div>
                            
                  		
                    @else
                    <h2> No record found !! </h2>
                    @endif
                  </div><!-- /post delivery .tab-content -->
<<<<<<< HEAD
				  <div class="tab-pane" id="tab_5">
				  	<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						  Add New Prescription
					</button> 
					<input type="hidden" id="id" value="{{ $biodata->id}}" />
					<input type="hidden" id="hmo" value="{{ $biodata->RegistrationType}}" />
						<p> </p>                	
                    @if (count($prescriptions) > 0)                   
						
							<div class="row">
                    			<div class="col-md-offset-1 col-xs-11">
								  
								  		<table class="table table-bordered">
								  			@foreach ($prescriptions as $prescription)
									  			<tr>
									  				<td><strong>{{$prescription->DrugRoute}}&nbsp;&nbsp;  {{$prescription->DrugName}}&nbsp;&nbsp;  {{$prescription->DrugDose}}{{$prescription->DrugDoseUnit}} &nbsp;&nbsp;  {{$prescription->DrugFrequency}}  {{$prescription->DrugFrequencyUnit}}&nbsp;&nbsp; X {{$prescription->DrugDuration}} {{$prescription->DrugDurationUnit}}</strong></td><td>{{date('jS F, Y',strtotime($prescription->created_at)) }} </td>
													<td>
														 {!! Form::open(array(
															'style' => 'display: inline-block;',
															'method' => 'DELETE',
															'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
															'url' => ['admin/clinics/prescription', $prescription->id])) !!}
														{!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
														{!! Form::close() !!}
													</td>
												  </tr>
								  			@endforeach
								  		</table>
								  		
								  	
								</div>		  	
							
							<!-- Partograph modal -->
							<div class="tab-pane active" id="tab_6">
							    <h2>Partograph</h2> 
							</div>         	
							</div>
                  		
                    @else
                    	<h2> No Records yet !! </h2>
                    @endif

				  </div><!-- /prescription .tab-content -->
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
             	 </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
        </div> 

<!-- Doctor Review Modal -->
<div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Review</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/labour/reviews']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
<<<<<<< HEAD
						                    {!! Form::label('Review', 'Review*', ['class' => 'control-label']) !!}
											<textarea name='Review'> </textarea>	
						                    <p class="help-block"></p>
						                    @if($errors->has('review'))
						                        <p class="help-block">
						                            {{ $errors->first('Review') }}
=======
						                    {!! Form::label('review', 'Review*', ['class' => 'control-label']) !!}
						                    {!! Form::textarea  ('review', old('review'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
						                    <p class="help-block"></p>
						                    @if($errors->has('review'))
						                        <p class="help-block">
						                            {{ $errors->first('review') }}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
						                        </p>
						                    @endif
						                </div>
				                </div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            
						            	{!! Form::hidden('clinicHistory_id', $id) !!}
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>
<<<<<<< HEAD
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
				                    {!! Form::select('DrugRoute', ['Syrup' => 'Syrup', 'Suspension' => 'Suspension', 'Tablet' => 'Tablet', 'Capsule' => 'Capsule', 'Intravenous' => 'Intravenous', 'Intramuscular' => 'Intramuscular', 'Subcutaneous' => 'Subcutaneous','Intranasal' => 'Intranasal', 'Sublingual' => 'Sublingual', 'Intrathecal' => 'Intrathecal', 'Intralesional' => 'Intralesional', 'Tropical' => 'Tropical','Inhalational' => 'Inhalational','Epidural' => 'Epidural','Eye Drop' => 'Eye Drop','Ear Drop' => 'Ear Drop', 'Intraosseous' => 'Intraosseous', 'Lotion' => 'Lotion', 'Pessary'=> 'Pessary', 'Consummable' => 'Consummable'], null, ['class' => 'form-control drugRoute','placeholder' => 'Pick a Drug Route...']); !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('DrugRoute'))
				                        <p class="help-block">
				                            {{ $errors->first('DrugRoute') }}
				                        </p>
				                    @endif
				                </div>
				                 <div class="col-xs-6 form-group">
				                    {!! Form::label('DrugName', 'Drug Name *', ['class' => 'control-label']) !!}
				                   	<select class="itemName form-control" name="DrugName">
									   </select>
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
				                	{!! Form::select('DrugDoseUnit', ['mg' => 'mg', 'i.u' => 'i.u', 'gram' => 'gram', 'L' => 'L' ,'ml' => 'ml', 'ug' => 'ug', 'mmol' => 'mmol', 'tab' => 'tab', 'amp' => 'amp', 'cap'=> 'cap', 'drop' => 'drop', 'On lesion' => 'On lesion', 'Pessary'=> 'Pessary','Pack'=> 'Pack'], null, ['class' => 'form-control','placeholder' => 'Pick a Dose Unit...']); !!}
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
				                	{!! Form::select('DrugFrequencyUnit', [ '.'=> '.', 'stat' => 'stat', 'hourly' => 'hourly', 'over 10 minutes' => 'over 10 minutes', '30 minutes before food'=> '30 minutes before food', 'stat' => 'stat', 'bolus' => 'bolus', 'daily' => 'daily', 'nocte'=> 'nocte', 'Over 8 hours'=> 'Over 8 hours', 'prn' => 'prn'], null, ['class' => 'form-control','placeholder' => 'Pick a Unit...']); !!}
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
				                	{!! Form::select('DrugDurationUnit', ['.' => '.','stat' => 'stat', 'Hours' => 'Hours','Days' => 'Days', 'Weekly' => 'Weekly', 'Monthly' => 'Monthly', 'doses'=> 'doses'], null, ['class' => 'form-control','placeholder' => 'Pick a Unit...']); !!}
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

                  		{!! Form::hidden('clinicHistory_id', $id) !!}
						{!! Form::hidden('section', 3) !!}
                    	{!! Form::close() !!}	

				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>

@stop

@section('javascript') 
	<script>
	 $(document).ready(function() {
		var env = window.location.host;
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }

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
	});


 	</script>
	 <script>
  tinymce.init({selector:'textarea'});
</script>

@endsection
=======


@stop

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

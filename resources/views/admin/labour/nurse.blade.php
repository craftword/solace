@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">    
    <li class="breadcrumb-item"><a href="{{ URL::to('admin/clinics/nurse/'.$id) }}">Back to Nurse Section</a></li>
    <li class="breadcrumb-item active" aria-current="page">Labour Section</li>
  </ol>
</nav>
 <h3 class="page-title">Labour Monitor (Nurse Section) </h3>
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
<<<<<<< HEAD
								  				<td><strong>Time Of Arrival</strong></td><td>{{ $labour->TimeOfArrival }}</td>
=======
								  				<td><strong>Time Of Arrival</strong></td><td>{{ date('jS F, Y',strtotime($labour->TimeOfArrival)) }}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
                    <h2> No record found </h2>
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
<<<<<<< HEAD
	                                                <th>Fetal Heart Rate(b/min) </th>
	                                                <th>Blood Pressure(mmHg) </th>
	                                                <th>Contraction(in 10 mins)</th>
													<th>Contraction Strength</th>
                                                    <th>Descent Of The Head</th>
                                                    <th>Cervical Dilatation(cm) </th>
	                                                <th>Cervical Effacement(%) </th>
=======
	                                                <th>Fetal Heart Rate </th>
	                                                <th>Blood Pressure </th>
	                                                <th>Contraction</th>
                                                    <th>Descent Of The Head</th>
                                                    <th>Cervical Dilatation </th>
	                                                <th>Cervical Effacement </th>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	                                                
	                                           </tr>
	                                        </thead>
	                                        <tbody>
									  			@foreach($signs as $sign)
									  			<tr>
<<<<<<< HEAD
									  				<td>{{$sign->created_at }}</td>
	                                                <td>{{$sign->FHR}}</td>
	                                                <td>{{$sign->SBP}} / {{$sign->DBP}}</td>
	                                                <td>{{$sign->Contraction}}</td>
													<td>{{$sign->Contractionstrength}}</td>
=======
									  				<td>{{date('jS F, Y',strtotime($sign->created_at))}}</td>
	                                                <td>{{$sign->FHR}}</td>
	                                                <td>{{$sign->BP}}</td>
	                                                <td>{{$sign->Contraction}}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
                    <p> </p>
                    <hr />
                    <h3> Add labour Visits </h3>
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/labour/signs']) !!}
                    	<div class="row">
                			<div class="col-md-offset-1 col-xs-10">
		                    	<div class="row table-responsive">
		                    		<table class="table table-bordered" id='lab'>
		                    			
		                    			<thead>
	                                           <tr>
	                                                	                                                
	                                                <th>Fetal Heart Rate </th>
	                                                <th>Blood Pressure </th>
	                                                <th>Contraction</th>
<<<<<<< HEAD
													<th>Strength of Contraction</th>
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                                    <th>Descent Of The Head</th>
                                                    <th>Cervical Dilatation </th>
	                                                <th>Cervical Effacement </th>
	                                                
	                                           
	                                                
	                                           </tr>
	                                    </thead>
					                    <tbody>
                                            <tr>
<<<<<<< HEAD
       	                                       <td><input type='text' name='FHR' class='form-control'/></td><td><input type='text' name='SBP' class='form-control' placeholder='SBP'/> / <input type='text' name='DBP' class='form-control'  placeholder='DBP'/></td><td><input type='text' name='Contraction' class='form-control'/></td><td><input type='text' name='Contractionstrength' class='form-control'/></td><td><input type='text' name='DOTH' class='form-control'/></td><td><input type='text' name='CD' class='form-control'/></td><td><input type='text' name='CE' class='form-control'/></td>
=======
       	                                       <td><input type='text' name='FHR' class='form-control'/></td><td><input type='text' name='BP' class='form-control' /></td><td><input type='text' name='Contraction' class='form-control' /></td><td><input type='text' name='DOTH' class='form-control'/></td><td><input type='text' name='CD' class='form-control'/></td><td><input type='text' name='CE' class='form-control'/></td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
                   

                  </div><!-- /labour vital sign .tab-content -->
                  <div class="tab-pane" id="tab_3">
                             				                  	
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
                    <h3 class="page-title">Add Post delivery History </h3>
                  		{!! Form::open(['method' => 'POST', 'url' => 'admin/labour/postdelivery']) !!}

                  			<div class="row">
				                <div class="col-xs-4 form-group">
                                    {!! Form::label('MOD', 'Mode of Delivery *', ['class' => 'control-label']) !!}
<<<<<<< HEAD
									<textarea name='MOD'> </textarea>
=======
                                        {!! Form::text('MOD', old('MOD'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                        <p class="help-block"></p>
                                        @if($errors->has('MOD'))
                                            <p class="help-block">
                                                {{ $errors->first('MOD') }}
                                            </p>
                                        @endif 
                                </div>
                                <div class="col-xs-4 form-group">
                                    {!! Form::label('PD', 'Placenta Delivery *', ['class' => 'control-label']) !!}
<<<<<<< HEAD
									<textarea name='PD'> </textarea>
=======
                                        {!! Form::text('PD', old('PD'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                        <p class="help-block"></p>
                                        @if($errors->has('PD'))
                                            <p class="help-block">
                                                {{ $errors->first('PD') }}
                                            </p>
                                        @endif 
                                </div>
                                <div class="col-xs-4 form-group">
                                    {!! Form::label('EBL', 'Estimated Blood Loss*', ['class' => 'control-label']) !!}
<<<<<<< HEAD
									<textarea name='EBL'> </textarea>
=======
                                        {!! Form::text('EBL', old('EBL'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                        <p class="help-block"></p>
                                        @if($errors->has('EBL'))
                                            <p class="help-block">
                                                {{ $errors->first('EBL') }}
                                            </p>
                                        @endif 
                                </div>
				            </div>
                            <div class="row">				               
                                <div class="col-xs-4 form-group">
                                    {!! Form::label('APGAR', '	APGAR Score *', ['class' => 'control-label']) !!}
<<<<<<< HEAD
									<textarea name='APGAR'> </textarea>
=======
                                        {!! Form::text('APGAR', old('APGAR'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                        <p class="help-block"></p>
                                        @if($errors->has('APGAR'))
                                            <p class="help-block">
                                                {{ $errors->first('APGAR') }}
                                            </p>
                                        @endif 
                                </div>
				            
                               <div class="col-xs-4 form-group">
                                    {!! Form::label('BW', 'Birth Weight *', ['class' => 'control-label']) !!}
<<<<<<< HEAD
									<textarea name='BW'> </textarea>
=======
                                        {!! Form::text('BW', old('BW'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                        <p class="help-block"></p>
                                        @if($errors->has('BW'))
                                            <p class="help-block">
                                                {{ $errors->first('BW') }}
                                            </p>
                                        @endif 
                                </div>
                                 <div class="col-xs-4 form-group">
                                    {!! Form::label('Length', 'Length *', ['class' => 'control-label']) !!}
<<<<<<< HEAD
									<textarea name='Length'> </textarea>
=======
                                        {!! Form::text('Length', old('Length'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                        <p class="help-block"></p>
                                        @if($errors->has('Length'))
                                            <p class="help-block">
                                                {{ $errors->first('Length') }}
                                            </p>
                                        @endif 
                                </div>
                            </div>
                             <div class="row">				               
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('PDN', 'Post Delivery Note*', ['class' => 'control-label']) !!}
<<<<<<< HEAD
									<textarea name='PDN'> </textarea>
=======
                                        {!! Form::textarea('PDN', old('PDN'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                        <p class="help-block"></p>
                                        @if($errors->has('PDN'))
                                            <p class="help-block">
                                                {{ $errors->first('PDN') }}
                                            </p>
                                        @endif 
                                </div>
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('Complication', 'Complication *', ['class' => 'control-label']) !!}
<<<<<<< HEAD
									<textarea name='Complication'> </textarea>
=======
                                        {!! Form::textarea('Complication', old('Complication'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                        <p class="help-block"></p>
                                        @if($errors->has('Complication'))
                                            <p class="help-block">
                                                {{ $errors->first('Complication') }}
                                            </p>
                                        @endif 
                                </div>
				            
                            </div>
                                                   
                             <div class="row">	               
                                
                                <div class="col-xs-12 form-group">
                                    {!! Form::label('DrugGiven', 'Drug Given *', ['class' => 'control-label']) !!}
<<<<<<< HEAD
									<textarea name='DrugGiven'> </textarea>
=======
                                        {!! Form::textarea('DrugGiven', old('DrugGiven'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                        <p class="help-block"></p>
                                        @if($errors->has('DrugGiven'))
                                            <p class="help-block">
                                                {{ $errors->first('DrugGiven') }}
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
                  </div><!-- /post delivery .tab-content -->
<<<<<<< HEAD

                   <div class="tab-pane" id="tab_5"> 
    				<div id="field" data-field-id="{{$prescriptions}}" ></div>              	
                  		@if (count($prescriptions) > 0)                   
						
							<div class="row">
                    			<div class="col-md-offset-1 col-xs-11">
								  
								  		<table class="table table-bordered">
								  			@foreach ($prescriptions as $prescription)
									  			<tr>
									  				<td><strong>{{$prescription->DrugRoute}}&nbsp;&nbsp;  {{$prescription->DrugName}}&nbsp;&nbsp;  {{$prescription->DrugDose}}{{$prescription->DrugDoseUnit}} &nbsp;&nbsp;  {{$prescription->DrugFrequency}}  {{$prescription->DrugFrequencyUnit}}&nbsp;&nbsp; {{$prescription->DrugDuration}}  {{$prescription->DrugDurationUnit}}</strong></td>
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
						
							<div class="tab-partograph">
								<h2>Partograph</h2>
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
                    section:3,
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
  tinymce.init({selector:'textarea'});
</script>
@endsection
=======

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

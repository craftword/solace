@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">    
    <li class="breadcrumb-item"><a href="{{ URL::to('admin/clinics/doctor/'.$id) }}">Back to Doctor Section</a></li>
    <li class="breadcrumb-item active" aria-current="page">Surgery Section</li>
  </ol>
</nav>
 <h3 class="page-title">Surgery Section </h3>
	 @if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
			</div>
	@endif
<<<<<<< HEAD
		@if (count($chartintraoperatives) > 1)
		
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
					Heart Rate: <button class="btn btn-primary"> </button> |Respiratory Rate: <button class="btn btn-warning"> </button> | O2: <button class="btn btn-success"> </button>
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
                  <li><a href="#tab_5" data-toggle="tab">Post Operative Order</a></li>                  
<<<<<<< HEAD
                  <li><a href="#tab_6" data-toggle="tab">Prescription</a></li>                    
=======
                                     
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">                    
                  		<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#preoperation">
						  Add New Review
						</button>
					
					<p> </p>                        				                  	
                    @if (count($preoperatives) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			@foreach($preoperatives as $preoperative)
								  			<tr>
<<<<<<< HEAD
								  				<td><textarea>{{ $preoperative->review}}</textarea></td>
			                    				<td>{{ $preoperative->created_at }}</td>
=======
								  				<td>{{ $preoperative->review}}</td>
			                    				<td>{{ date('jS F, Y',strtotime($preoperative->created_at))}}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
	                                                <th>Blood Pressure </th>
	                                                <th>Respiratory Rate </th>
	                                                <th>Heart Rate </th>
	                                                <th>CO2 </th>
	                                                <th>O2 </th>
	                                                <th>Blood PH </th>
	                                                <th>Time </th>
	                                           </tr>
	                                        </thead>
	                                        <tbody>
									  			@foreach($intraoperatives as $intraoperative)
									  			<tr>
<<<<<<< HEAD
									  				<td>{{$intraoperative->SBP}} / {{$intraoperative->DBP}}</td>
=======
									  				<td>{{$intraoperative->BloodPressure}}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	                                                <td>{{$intraoperative->RespiratoryRate}}</td>
	                                                <td>{{$intraoperative->HeartRate}}</td>
	                                                <td>{{$intraoperative->CO2}}</td>
	                                                <td>{{$intraoperative->O2}}</td>
	                                                <td>{{$intraoperative->BloodPH}}</td>
	                                                <td>{{$intraoperative->created_at}}</td>
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
                    <h3> Add New Chart </h3>
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/surgeries/intraoperative']) !!}
                    	<div class="row">
                			<div class="col-md-offset-1 col-xs-10">
		                    	<div class="row table-responsive">
		                    		<table class="table table-bordered" id='lab'>
		                    			
		                    			<thead>
	                                           <tr>
	                                                <th>Blood Pressure </th>
	                                                <th>Respiratory Rate </th>
	                                                <th>Heart Rate </th>
	                                                <th>CO2 </th>
	                                                <th>O2 </th>
	                                                <th>Blood PH </th>
	                                                
	                                           </tr>
	                                    </thead>
					                    <tbody>
                                            <tr>
<<<<<<< HEAD
       	                                       <td><input type='text' name='SBP' class='form-control' placeholder='SBP'/> / <input type='text' name='DBP' class='form-control' placeholder='DBP'/></td> <td><input type='text' name='RespiratoryRate' class='form-control' /></td><td><input type='text' name='HeartRate' class='form-control' /></td><td><input type='text' name='CO2' class='form-control'/></td><td><input type='text' name='O2' class='form-control'/></td><td><input type='text' name='BloodPH' class='form-control'/></td>
=======
       	                                       <td><input type='text' name='BloodPressure' class='form-control'/></td><td><input type='text' name='RespiratoryRate' class='form-control' /></td><td><input type='text' name='HeartRate' class='form-control' /></td><td><input type='text' name='CO2' class='form-control'/></td><td><input type='text' name='O2' class='form-control'/></td><td><input type='text' name='BloodPH' class='form-control'/></td>
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

                  </div><!-- /Intra .tab-content -->
<<<<<<< HEAD
                  <div class="tab-pane" id="tab_3">				  		
=======
                  <div class="tab-pane" id="tab_3">
				  		
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
				  		@if (count($operatives) > 0)
						  	<div class="row">
                    			<div class="col-md-offset-1 col-md-10">
								  <div class="panel panel-primary">
								  	<div class="panel-body">
								  		<p><strong>Note:</strong></p>
<<<<<<< HEAD
										  <textarea style="color:red;"> {{$operatives[0]->note}} </textarea>
								  	  
=======
								  		{{$operatives[0]->note}}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
								  	</div>
								  </div>
								</div>
							</div>
						@else
							<h3 class="page-title">Add New Operative Note </h3>
                  		{!! Form::open(['method' => 'POST', 'url' => 'admin/surgeries/operative']) !!}
<<<<<<< HEAD
                 
                  			<div class="row table-responsive">
				                <div class="col-md-offset-1 col-xs-10">
				                     {!! Form::label('Note', 'Note *', ['class' => 'control-label']) !!}									 
									<textarea name='Note'> </textarea>
				                    <p class="help-block"></p>
				                    @if($errors->has('Note'))
				                        <p class="help-block">
				                            {{ $errors->first('Note') }}
=======

                  			<div class="row">
				                <div class="col-md-offset-1 col-xs-10 form-group">
				                    {!! Form::label('Note', 'Note *', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('note', old('note'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('note'))
				                        <p class="help-block">
				                            {{ $errors->first('note') }}
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
						@endif

                  </div><!-- /Ope.tab-content -->
                  <div class="tab-pane" id="tab_4">
                        <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postoperation">
						  Add New Review
						</button>
					
					<p> </p>                        				                  	
                    @if (count($postoperatives) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			@foreach($postoperatives as $postoperative)
								  			<tr>
<<<<<<< HEAD
								  				<td><textarea>{{ $postoperative->review}}</textarea></td>
			                    				<td>{{ $postoperative->created_at }}</td>
=======
								  				<td>{{ $postoperative->review}}</td>
			                    				<td>{{ date('jS F, Y',strtotime($postoperative->created_at))}}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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

                    <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postoperativeorder">
						  Add New Review
						</button>
					
					<p> </p>                        				                  	
                    @if (count($postoperativeorders) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
								  		<table class="table table-bordered">
								  			@foreach($postoperativeorders as $postoperativeorder)
								  			<tr>
<<<<<<< HEAD
								  				<td><textarea>{{ $postoperativeorder->order}}</textarea></td>
			                    				<td>{{ $postoperativeorder->created_at }}</td>
=======
								  				<td>{{ $postoperativeorder->order}}</td>
			                    				<td>{{ date('jS F, Y',strtotime($postoperativeorder->created_at))}}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
									  				<td><strong>{{$prescription->DrugRoute}}&nbsp;&nbsp;  {{$prescription->DrugName}}&nbsp;&nbsp;  {{$prescription->DrugDose}}{{$prescription->DrugDoseUnit}} &nbsp;&nbsp;  {{$prescription->DrugFrequency}}  {{$prescription->DrugFrequencyUnit}}&nbsp;&nbsp; X {{$prescription->DrugDuration}} {{$prescription->DrugDurationUnit}}</strong></td><td>{{$prescription->created_at }} </td>
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

<!-- Pre Operation Modal -->
<div class="modal fade" id="preoperation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Review</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/surgeries/preoperative']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
<<<<<<< HEAD
						                    {!! Form::label('Review', 'Review*', ['class' => 'control-label']) !!}
																<textarea name='Review'> </textarea>
						                   
						                    <p class="help-block"></p>
						                    @if($errors->has('Review'))
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

<!-- Post Operation Modal -->
<div class="modal fade" id="postoperation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Review</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/surgeries/postoperative']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
<<<<<<< HEAD
						                    {!! Form::label('Review', 'Review*', ['class' => 'control-label']) !!}
																<textarea name='Review'> </textarea>
						                  
						                    <p class="help-block"></p>
						                    @if($errors->has('Review'))
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

<!-- Post Operation Order Modal -->
<div class="modal fade" id="postoperativeorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Review</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/surgeries/postoperativeorder']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
<<<<<<< HEAD
						                    {!! Form::label('Order', 'Order *', ['class' => 'control-label']) !!}
																<textarea name='Order'> </textarea>
						                    
						                    <p class="help-block"></p>
						                    @if($errors->has('Order'))
						                        <p class="help-block">
						                            {{ $errors->first('Order') }}
=======
						                    {!! Form::label('order', 'Order *', ['class' => 'control-label']) !!}
						                    {!! Form::textarea  ('order', old('order'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
						                    <p class="help-block"></p>
						                    @if($errors->has('order'))
						                        <p class="help-block">
						                            {{ $errors->first('order') }}
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
				                	{!! Form::select('DrugDurationUnit', [ '.' => '.', 'stat' => 'stat', 'Hours' => 'Hours','Days' => 'Days', 'Weekly' => 'Weekly', 'Monthly' => 'Monthly', 'doses'=> 'doses'], null, ['class' => 'form-control','placeholder' => 'Pick a Unit...']); !!}
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
						{!! Form::hidden('section', 1) !!}
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
								lineWidth: 5,
								

								}); 

								Morris.Line({
								element: 'operative2',
								data: arr2,
								xkey: 'v',
								ykeys: ['y', 'z', 'x'],
								labels: ['HeatRate', 'Respiratory', 'Saturation Oxygen'],
								parseTime:false,
								lineColors: ['#0000FF', '#FFFF00', '#6B8E23'],
								lineWidth: 5,
								

								}); 

                              </script>
<script>
  tinymce.init({selector:'textarea'});
</script>

@endsection

=======
@stop

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

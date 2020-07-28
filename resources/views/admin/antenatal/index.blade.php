@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">    
    <li class="breadcrumb-item"><a href="{{ URL::to('admin/clinics/doctor/'.$id) }}">Back to Doctor Section</a></li>
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
<<<<<<< HEAD
                                                <td><strong>Estimated Gestation Age</strong></td><td>@if($antenatal->ega >= 40) Post-term @else  {{$antenatal->ega}} Weeks @endif</td>
=======
                                                <td><strong>Estimated Gestation Age</strong></td><td>{{ $antenatal->ega}} Weeks</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
                    <h3 class="page-title">Add Antenatal History </h3>
                  		{!! Form::open(['method' => 'POST', 'url' => 'admin/antenatal/antenatal']) !!}

                  			<div class="row">
				                <div class="col-xs-4 form-group">
                                    {!! Form::label('LMP', 'Last Menstrual Period*', ['class' => 'control-label']) !!}
                                    {!! Form::date('LMP', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('LMP'))
                                        <p class="help-block">
                                            {{ $errors->first('LMP') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
				                <div class="col-xs-4 form-group">
                                    {!! Form::label('Gravity', 'Gravity *', ['class' => 'control-label']) !!}
                                        {!! Form::text('Gravity', old('Gravity'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('Gravity'))
                                            <p class="help-block">
                                                {{ $errors->first('Gravity') }}
                                            </p>
                                        @endif 
                                </div>
                                <div class="col-xs-4 form-group">
                                    {!! Form::label('Parity', 'Parity *', ['class' => 'control-label']) !!}
                                        {!! Form::text('Parity', old('Parity'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('Parity'))
                                            <p class="help-block">
                                                {{ $errors->first('Parity') }}
                                            </p>
                                        @endif 
                                </div>
				            </div>
                            <div class="row">
				                <div class="col-xs-6 form-group">
                                    {!! Form::label('NumberOfliveBirth', 'Number Of live Birth *', ['class' => 'control-label']) !!}
                                        {!! Form::text('NumberOfliveBirth', old('NumberOfliveBirth'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('NumberOfliveBirth'))
                                            <p class="help-block">
                                                {{ $errors->first('NumberOfliveBirth') }}
                                            </p>
                                        @endif 
                                </div>
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('NumberOfAbortion', 'Number Of Abortion *', ['class' => 'control-label']) !!}
                                        {!! Form::text('NumberOfAbortion', old('NumberOfAbortion'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('NumberOfAbortion'))
                                            <p class="help-block">
                                                {{ $errors->first('NumberOfAbortion') }}
                                            </p>
                                        @endif 
                                </div>
				            </div>
                            <div class="row">
				                <div class="col-xs-12 form-group">
				                    {!! Form::label('PresentPregnancyHistory', 'Present Pregnancy History*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('PresentPregnancyHistory', old('PresentPregnancyHistory'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('PresentPregnancyHistory'))
				                        <p class="help-block">
				                            {{ $errors->first('PresentPregnancyHistory') }}
				                        </p>
				                    @endif
				                </div>
                            </div>
                            <div class="row">
				                <div class="col-xs-12 form-group">
				                    {!! Form::label('PastObstetricHistory', 'Past Obstetric History*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('PastObstetricHistory', old('PastObstetricHistory'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('PastObstetricHistory'))
				                        <p class="help-block">
				                            {{ $errors->first('PastObstetricHistory') }}
				                        </p>
				                    @endif
				                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
				                    {!! Form::label('SpecialInstruction', 'Special Instruction*', ['class' => 'control-label']) !!}
				                    {!! Form::textarea('SpecialInstruction', old('SpecialInstruction'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('SpecialInstruction'))
				                        <p class="help-block">
				                            {{ $errors->first('SpecialInstruction') }}
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
                  </div><!-- /Antenatal .tab-content -->
<<<<<<< HEAD
                  <div class="tab-pane" id="tab_2">				                     	    
					@if (count($antenatalvisits) > 0)
					<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-11">								  						  		
=======
                  <div class="tab-pane" id="tab_2">                   	    
					      @if (count($antenatalvisits) > 0)
                    	
							<div class="row table-responsive">
                    			<div class="col-md-offset-1 col-xs-10">								  						  		
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
								  		<table class="table table-bordered">
								  			<thead>
	                                           <tr>
	                                                <th>Date </th>
	                                                <th>Height of Funds </th>
	                                                <th>Presentation and Position</th>
	                                                <th>Relation Of Presenting Part To BRIM </th>
	                                                <th>Urine For Protein </th>
                                                    <th>PCV </th>
<<<<<<< HEAD
                                                    <th>Fetal Heart Rate </th>
=======
                                                    <th>Filter Heart Rate </th>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
								
<<<<<<< HEAD
							</div>              
					                 
=======
							</div>
                    
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                  		
                    @else
                   
                    	<h3> No record found </h3>

                    @endif
<<<<<<< HEAD

					@if ($antenatalatest->HOF == null)
					
					 <p> </p>
                    <hr />
					
                    <h3> Add Antenatal Visits </h3>
					 {!! Form::model($antenatalatest, ['method' => 'PUT', 'url' => ['admin/antenatal/visits', $antenatalatest->id]]) !!}
                   
=======
                    <p> </p>
                    <hr />
                    <h3> Add Antenatal Visits </h3>
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/antenatal/visits']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    	<div class="row">
                			<div class="col-md-offset-1 col-xs-10">
		                    	<div class="row table-responsive">
		                    		<table class="table table-bordered" id='lab'>
		                    			
		                    			<thead>
	                                           <tr>
<<<<<<< HEAD
	                                                <th>Height of Fundus </th>
=======
	                                                <th>Height of Funds </th>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	                                                <th>Presentation and Position</th>
	                                                <th>Relation Of Presenting Part To BRIM </th>
	                                                <th>Urine For Protein </th>
                                                    <th>PCV </th>
<<<<<<< HEAD
                                                    <th>Fetal Heart Rate </th>
=======
                                                    <th>Filter Heart Rate </th>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
	                                                <th>Weight </th>
	                                                <th>Blood Pressure</th>
                                                    <th>Remark</th>
	                                                
	                                           </tr>
	                                    </thead>
					                    <tbody>
                                            <tr>
<<<<<<< HEAD
       	                                        <td>{!! Form::text('HOF', old('HOF'), ['class' => 'form-control']) !!}</td>
												<td>{!! Form::text('PAP', old('PAP'), ['class' => 'form-control']) !!}</td>
												<td>{!! Form::text('ROPPTB', old('ROPPTB'), ['class' => 'form-control']) !!}</td>
												<td>{!! Form::text('UFP', old('UFP'), ['class' => 'form-control']) !!}</td>
												<td>{!! Form::text('PCV', old('PCV'), ['class' => 'form-control']) !!}</td>
												<td>{!! Form::text('FHR', old('FHR'), ['class' => 'form-control']) !!}</td>
												<td>{!! Form::text('Weight', old('Weight'), ['class' => 'form-control']) !!}</td>
												<td>{!! Form::text('BP', old('BP'), ['class' => 'form-control']) !!}</td>
												<td>{!! Form::text('Remark', old('Remark'), ['class' => 'form-control']) !!}</td>
=======
       	                                       <td><input type='text' name='HOF' class='form-control'/></td><td><input type='text' name='PAP' class='form-control' /></td><td><input type='text' name='ROPPTB' class='form-control' /></td><td><input type='text' name='UFP' class='form-control'/></td><td><input type='text' name='PCV' class='form-control'/></td><td><input type='text' name='FHR' class='form-control'/></td><td><input type='text' name='Weight' class='form-control'/></td><td><input type='text' name='BP' class='form-control'/></td><td><input type='text' name='Remark' class='form-control'/></td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
       	                                    </tr>
					                    </tbody>


		                    	   	</table>
		                    	</div>
		                    </div>
		                </div>
		                <div class="row">		                	
					        <div class="col-md-offset-10 col-xs-2 form-group">
<<<<<<< HEAD
					            {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-primary']) !!}
					        </div>
					    </div>
					            
				            {!! Form::close() !!}                 
                     		                 				                  	
                      @else
                   
                    	<h3> No New Visits </h3>

                    @endif

                  </div><!-- /Antenatal visit .tab-content -->
                  
				  <div class="tab-pane" id="tab_3">
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
									  				<td><strong>{{$prescription->DrugRoute}}&nbsp;&nbsp;  {{$prescription->DrugName}}&nbsp;&nbsp;  {{$prescription->DrugDose}}{{$prescription->DrugDoseUnit}} &nbsp;&nbsp;  {{$prescription->DrugFrequency}}  {{$prescription->DrugFrequencyUnit}}&nbsp;&nbsp;  {{$prescription->DrugDuration}} {{$prescription->DrugDurationUnit}}</strong></td><td>{{date('jS F, Y',strtotime($prescription->created_at)) }} </td>
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
					            {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
					        </div>
					    </div>
					            
				            	{!! Form::hidden('clinicHistory_id', $id) !!}
				                {!! Form::close() !!}                  		                 				                  	
                   

                  </div><!-- /Antenatal visit .tab-content -->
                  
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
             	 </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
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
				                	{!! Form::select('DrugFrequencyUnit', ['.' => '.', 'stat' => 'stat', 'hourly' => 'hourly', 'over 10 minutes' => 'over 10 minutes', '30 minutes before food'=> '30 minutes before food', 'stat' => 'stat', 'bolus' => 'bolus', 'daily' => 'daily', 'nocte'=> 'nocte', 'Over 8 hours'=> 'Over 8 hours', 'prn' => 'prn'], null, ['class' => 'form-control','placeholder' => 'Pick a Unit...']); !!}
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
						{!! Form::hidden('section', 2) !!}
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

@endsection



=======
@stop

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

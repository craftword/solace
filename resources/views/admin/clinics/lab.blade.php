@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.patients.waiting_patients') }}">Waiting Patients</a></li>
    <li class="breadcrumb-item"><a href="{{ url('admin/clinics/view/'.$biodata->id) }}">Histories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Laboratory Section</li>
  </ol>
</nav>
 <h3 class="page-title">Patient Clinical Histories (Laboratory Section)</h3>
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
                  <li class="active"><a href="#tab_1" data-toggle="tab">Patients Profile</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Laboratory Test </a></li>                  
                                       
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
                  <h3> Update Test Results </h3>                 	
                    @if (count($laboratories) > 0) 
                    	{!! Form::open(['method' => 'PUT', 'url' => 'admin/clinics/lab/'.$history->id]) !!}                   	
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
													<tr><td>{{$laboratory->LabTestName}}</td><td><input type='text' class='form-control' name='result[{{$laboratory->id}}]' value='{{$laboratory->Result}}' /></td><td>{{$laboratory->Reference}}</td><td>{{$laboratory->LabCost}}</td></tr>
													<input type='hidden' class='form-control' name='id[]' value='{{$laboratory->id}}' />
												@endforeach
						                    </tbody>
								  		</table>
								  		
								  	</div>
								  	<div class="row">		                	
								        <div class="col-md-offset-10 col-xs-2 form-group">
								            {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-primary']) !!}
								        </div>
								    </div>
								            
							            	
							                {!! Form::close() !!}
											  
								</div>		  	
								
							</div>							                 		
                  		
                    @else
                    	<h2> No Lab result request yet!!</h2>
                    @endif
                    
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
        </div>     

      


@stop
@section('javascript') 
   
@endsection
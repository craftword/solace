@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

 <h3 class="page-title">Patient Biodata</h3> 
					<!-- /.success pane -->
         <!-- START CUSTOM TABS -->
        <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Patients Profile</a></li>                                 
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                  	 @if (count($biodata) > 0)
                  	 	<div class="row">                			
                			<div class="col-md-offset-3 col-xs-6">
                        		<h1>{{ $biodata->Surname }}
		                        {{ $biodata->Firstname }}
		                        {{ $biodata->Middlename }}</h1>
		                     </div> 
                        	<div class="col-xs-3">
                        		   	
		                                          	
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
            </div>

		</div><!-- nav-tabs-custom -->
    </div><!-- /.col -->
 </div>     

@stop
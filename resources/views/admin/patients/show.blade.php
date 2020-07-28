@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.patients.index') }}">Patients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Patient Profile</li>
  </ol>
</nav>
 @if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
			</div>
	@endif
<div class="panel panel-default">
    <div class="panel-heading">
        Patient Profile
    </div>
	<div class="row">                			
    	<div class="col-md-offset-3 col-xs-7">
        	<h1>{{ $patients->Surname }}
		    	{{ $patients->Firstname }}
		        {{ $patients->Middlename }}</h1>
								
		</div> 
	</div>
    <div class="row">
        <div class="col-md-offset-1 col-xs-10">
         
		    <div class="row table-responsive">
		        <table class="table table-bordered">
		            <tr>
		                <td><strong>Sex</strong></td><td>{{ $patients->Sex }}</td> <td><strong>Date of Birth</strong></td><td>{{ $patients->Birthdate}}</td> <td><strong> Picture </strong></td>
		            </tr>
		            <tr>
		            	<td><strong>Email</strong></td><td>{{ $patients->Email }}</td> <td><strong>Religion</strong></td><td>{{ $patients->Religion}}</td><td rowspan="5" align="centre"> <img class="img-response" src="@if($patients->Photograph == null){{URL::to('/')}}/images/default.PNG @else {{URL::to('/')}}/{{$patients->Photograph}} @endif" alt="" /> <br />
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pic">
						  Edit Picture
						</button></td>
		            </tr>
		            <tr>
		                <td><strong>Address</strong></td><td>{{ $patients->Address }}</td><td><strong>Phone Number</strong></td><td>{{ $patients->PhoneNumber}}</td>
		            </tr>
		            <tr>
		                <td><strong>State Of Origin</strong></td><td>{{ $patients->StateOfOrigin }}</td> <td><strong>Nationality</strong></td><td>{{ $patients->Nationality}}</td>
		            </tr>
		            <tr>
		                <td><strong>Next Of Kin </strong></td><td>{{ $patients->NextOfKin }}</td> <td><strong>Next Of Kin Phone</strong></td><td>{{ $patients->NextOfKinPhone}}</td>
					</tr>
					<tr>
						<td><strong>Registration Type</strong></td><td>{{ $patients->RegistrationType}}<input type="hidden" id="hmo" value="{{ $patients->RegistrationType}}" /></td><td><strong>Next Of Kin Address</strong></td><td>{{ $patients->NextOfKinAddress}}</td>
		            </tr>
					
		        </table>
		    </div>
        </div>
	</div>
</div>









<!-- Picture Modal -->
<div class="modal fade" id="pic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Picture</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/uploadPic', 'enctype' => 'multipart/form-data']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
						                 {!! Form::file('image', array('class' => 'form-control')) !!}   						                    
						            </div>
				                </div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>
							            {!! Form::hidden('biodata_id', $patients->id) !!}						            	
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>
@stop





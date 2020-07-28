@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
@if ($message = Session::get('unsuccessfully'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
@endif
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Unregister Patients</li>
  </ol>
</nav>

<h3 class="page-title">Patients Documents</h3> 
<div class="panel panel-default">        
					<div class="row">
            <div class="col-md-offset-1 col-xs-10">
		          <div class="row table-responsive">
		             <table class="table table-bordered">
                  <thead>
                     <th> Scan Document </th>
                  </thead>
									<tbody>
									@if (count($labfiles) > 0) 
						        @foreach ($labfiles as $labfile)
											<tr><td><strong><a href="{{asset($labfile->Url)}}"  target="_blank"> {{$labfile->Name}} </a></strong></td>	
										@endforeach
									 @else
                        <h4>No records </h4>
                   @endif
						            </tbody>

								</table>
							</div>
						</div>
					</div>
	<hr />
  <h4> Upload Files </h4>
			   <hr />
			    {!! Form::open(array('method' => 'POST','url' => '/admin/unregisteredPatient','enctype' => 'multipart/form-data')) !!} 
				  <div class="row">
				  	<div class="col-md-offset-1 col-md-3">
						 {!! Form::text('Name', old('Name'), ['class' => 'form-control', 'placeholder' => 'Enter the Name of the file', 'required' => '']) !!}
				        <p class="help-block"></p>
				        @if($errors->has('Name'))
				            <p class="help-block">
				                {{ $errors->first('Name') }}
				            </p>
				         @endif
						
					</div>
					<div class="col-md-offset-1 col-md-4">

						{!! Form::file('image', array('class' => 'image')) !!}
						
					</div>
					<div class="col-md-3">

						<button type="submit" class="btn btn-success">Upload</button>
					</div>
				</div>
				
				{!! Form::hidden('biodata_id', $biodata_id) !!}
				{!! Form::close() !!}

</div>


@stop
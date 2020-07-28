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
    <li class="breadcrumb-item"><a href="{{ route('admin.patients.index') }}">Patients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Family Card</li>
  </ol>
</nav>
    <h3 class="page-title">Family Card</h3>
    <p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#family">
			 Add New Card
		</button>
    </p>
<div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($families) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Family Name</th>
                        <th>Family Type</th>
                        <th>Time </th>
                                                                    

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($families) > 0)
                        @foreach ($families as $family)
                            <tr data-entry-id="{{ $family->id }}">
                                <td></td>
                                <td>{{ $family->familyname }}</td>
                                <td>{{ $family->familytype }}</td>
                                <td>{{ $family->created_at }}</td>                                                       
                                
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
   <!-- Family Card Modal -->
<div class="modal fade" id="family" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Family Card</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/addFamilyCard']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
						                     {!! Form::label('familyname', 'Family name*', ['class' => 'control-label']) !!}
						                     {!! Form::text('familyname', old('familyname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
						                    <p class="help-block"></p>
						                    @if($errors->has('familyname'))
						                        <p class="help-block">
						                            {{ $errors->first('familyname') }}
						                        </p>
						                    @endif
						                </div>
                                    <div class="col-xs-6 form-group">
                                        {!! Form::label('familytype', ' Family type', ['class' => 'control-label']) !!}
                                        {!! Form::select('familytype', ['Super' => 'Super', 'Ordinary' => 'Ordinary'], null, ['class' => 'form-control','placeholder' => 'Pick a Type...']); !!}
                                    </div>
				                </div>
				                <div class="row">		                	
							        <div class="col-md-offset-10 col-xs-2 form-group">
									{!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
							        </div>
							    </div>						            					            	
						                {!! Form::close() !!}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>

@stop

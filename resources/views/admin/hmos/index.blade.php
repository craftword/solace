@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

 
     @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
    @endif
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">HMOS</li>
  </ol>
</nav>
<h3 class="page-title">HMO Section </h3>
         <!-- /.success pane -->
         <!-- START CUSTOM TABS -->
        <div class="row">
            <div class="col-md-12">             
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">HMO REGISTRATION</a></li>
                  <li><a href="#tab_2" data-toggle="tab">PLANS</a></li>
                  <li><a href="#tab_3" data-toggle="tab">PROCEDURES</a></li>
                  <li><a href="#tab_4" data-toggle="tab">DRUGS </a></li>
                  <li><a href="#tab_5" data-toggle="tab">LAB TESTS</a></li>
                                  
                                     
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                         <p>
                            <a href="{{ route('admin.hmos.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
                        </p>

                        <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th style="text-align:center;"></th>

                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>SignOnDate</th>                        
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($hmos) > 0)
                        @foreach ($hmos as $hmo)
                            <tr data-entry-id="{{ $hmo->id }}">
                                <td>{{ $hmo->id }}</td>
                                <td>{{ $hmo->Name }}</td>
                                <td>{{ $hmo->Phone }}</td>
                                <td>{{ $hmo->Email }}</td>
                                <td>{{ $hmo->SignOnDate }}</td>
                                
                                <td>
                                   <a href="{{ route('admin.hmos.edit',[$hmo->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.hmos.destroy', $hmo->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            </div><!-- /Ope.tab-content -->
                    <div class="tab-pane" id="tab_2">
                        <h3 class="page-title">Add Row </h3>                     
                        {!! Form::open(['method' => 'POST', 'url' => 'admin/addPlan']) !!}
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('HMO', 'HMOs *', ['class' => 'control-label']) !!}
                                    {!! Form::select('hmoName', $hmoName, old('hmoName'), ['class' => 'form-control','placeholder' => 'Pick a HMO Name...']); !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('hmoName'))
                                        <p class="help-block">
                                            {{ $errors->first('hmoName') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            {!! Form::open(['method' => 'POST', 'url' => 'admin/addPlan']) !!}
                            <!-- Button trigger modal -->
                        <a href="#" class="btn btn-primary plan">Add New PLANS</a>
                            <div class="row">
                                <div class="col-md-offset-1 col-xs-10">
                                    <div class="row table-responsive">
                                        <table class="table table-bordered">
                                            
                                            <tbody class="planbody">
                                                
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
                       
                        {!! Form::close() !!}   
                        
                    </div><!-- /Ope.tab-content -->
                    <div class="tab-pane" id="tab_3">
                       <h3 class="page-title">Add New Procedure </h3>                     
                        {!! Form::open(['method' => 'POST', 'url' => 'admin/importfileProcedure']) !!}
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('HMO', 'HMOs *', ['class' => 'control-label']) !!}
                                    {!! Form::select('hmoName', $hmoName, old('hmoName'), ['class' => 'form-control','placeholder' => 'Pick a HMO Name...']); !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('hmoName'))
                                        <p class="help-block">
                                            {{ $errors->first('hmoName') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('Upload file', 'Upload File *', ['class' => 'control-label']) !!}
                                    {{ Form::file('thefile', ['class' => 'control-label']) }}
                                    <p class="help-block"></p>
                                    @if($errors->has('thefile'))
                                        <p class="help-block">
                                            {{ $errors->first('thefile') }}
                                        </p>
                                    @endif
                                </div>
                                
                            </div>                            

                        <div class="row">
                            <div class="col-md-offset-10 col-xs-2 form-group">
                                {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                       
                        {!! Form::close() !!}   
                    </div><!-- /procedure.tab-content -->
                     <div class="tab-pane" id="tab_4">
                     <h3 class="page-title">Add New Drug </h3>                     
                        {!! Form::open(['method' => 'POST', 'url' => 'admin/importfileDrug']) !!}
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('HMO', 'HMOs *', ['class' => 'control-label']) !!}
                                    {!! Form::select('hmoName', $hmoName, old('hmoName'), ['class' => 'form-control','placeholder' => 'Pick a HMO Name...']); !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('hmoName'))
                                        <p class="help-block">
                                            {{ $errors->first('hmoName') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('Upload file', 'Upload File *', ['class' => 'control-label']) !!}
                                    {{ Form::file('thefile', ['class' => 'control-label']) }}
                                    <p class="help-block"></p>
                                    @if($errors->has('thefile'))
                                        <p class="help-block">
                                            {{ $errors->first('thefile') }}
                                        </p>
                                    @endif
                                </div>
                                
                            </div>                            

                        <div class="row">
                            <div class="col-md-offset-10 col-xs-2 form-group">
                                {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                       
                        {!! Form::close() !!}  
                    </div><!-- /Drug.tab-content -->
                    <div class="tab-pane" id="tab_5">
                        <h3 class="page-title">Add New Lab Test </h3>                     
                        {!! Form::open(['method' => 'POST', 'url' => 'admin/importfileLab']) !!}
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('HMO', 'HMOs *', ['class' => 'control-label']) !!}
                                    {!! Form::select('hmoName', $hmoName, old('hmoName'), ['class' => 'form-control','placeholder' => 'Pick a HMO Name...']); !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('hmoName'))
                                        <p class="help-block">
                                            {{ $errors->first('hmoName') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="col-xs-6 form-group">
                                    {!! Form::label('Upload file', 'Upload File *', ['class' => 'control-label']) !!}
                                    {{ Form::file('thefile', ['class' => 'control-label']) }}
                                    <p class="help-block"></p>
                                    @if($errors->has('thefile'))
                                        <p class="help-block">
                                            {{ $errors->first('thefile') }}
                                        </p>
                                    @endif
                                </div>
                                
                            </div>                            

                        <div class="row">
                            <div class="col-md-offset-10 col-xs-2 form-group">
                                {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                       
                        {!! Form::close() !!}
                    </div><!-- /Drug.tab-content -->
                 </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
        </div>     


@stop
@section('javascript') 
    <script>
    
       $('.plan').on('click', function(){
       	
       	 var  html ="<tr><td><input type='text' class='form-control' name='rows[]'/></td></tr>"
		  $('.planbody').append(html);  		             					    	
					    
				
       });
		
    </script>
@endsection

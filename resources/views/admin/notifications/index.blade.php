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
    <li class="breadcrumb-item active" aria-current="page">Notification</li>
  </ol>
</nav>
<div class="row"> 
	<div class="col-md-12">
		<div class="panel panel-primary">
	        <div class="panel-body">
			  <p><strong>Notification:</strong></p>
			  {!! Form::open(['method' => 'POST', 'route' => ['admin.notifications.store']]) !!}

                  			<div class="row">
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('receiveId', 'Users', ['class' => 'control-label']) !!}
				                   	{!! Form::select('receiveId', $users, old('receiveId'), ['class' => 'form-control','placeholder' => 'Pick a Name...']); !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('receiveId'))
				                        <p class="help-block">
				                            {{ $errors->first('receiveId') }}
				                        </p>
				                    @endif
				                </div>
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('department', 'Department', ['class' => 'control-label']) !!}
				                    	{!! Form::select('department', $roles, old('department'), ['class' => 'form-control','placeholder' => 'Pick a Department...']); !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('department'))
				                        <p class="help-block">
				                            {{ $errors->first('department') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
				           	 <div class="row">
				                <div class="col-xs-12 form-group">
				                    {!! Form::label('message', 'Message *', ['class' => 'control-label']) !!}
				                    {!! Form::textarea  ('message', old('message'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('message'))
				                        <p class="help-block">
				                            {{ $errors->first('message') }}
				                        </p>
				                    @endif
				                </div>
				             </div>
				            <div class="row">
				                <div class="col-md-offset-10 col-xs-2 form-group">
				                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
				                </div>
				            </div>
				        {!! Form::hidden('read', 0) !!}
                  		{!! Form::hidden('sendername', Auth::user()->firstname .' ' .Auth::user()->lastname ) !!}

                    {!! Form::close() !!}
			  
			</div>
		</div>

	</div>
</div>


@stop
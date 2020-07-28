@extends('layouts.app')

@section('content')
    <h3 class="page-title">Edit HMO COMPANY</h3>
     {!! Form::model($hmos, ['method' => 'PUT', 'route' => ['admin.hmos.update', $hmos->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Name', 'Name *', ['class' => 'control-label']) !!}
                    {!! Form::text('Name', old('Name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Name'))
                        <p class="help-block">
                            {{ $errors->first('Name') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Phone', 'Phone *', ['class' => 'control-label']) !!}
                    {!! Form::text('Phone', old('Phone'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Phone'))
                        <p class="help-block">
                            {{ $errors->first('Phone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Email', 'Email *', ['class' => 'control-label']) !!}
                     {!! Form::text('Email', old('Email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    
                    <p class="help-block"></p>
                    @if($errors->has('Email'))
                        <p class="help-block">
                            {{ $errors->first('Email') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('SignOnDate', 'Sign On Date *', ['class' => 'control-label']) !!}
                     {!! Form::date('SignOnDate', old('SignOnDate'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    
                    <p class="help-block"></p>
                    @if($errors->has('SignOnDate'))
                        <p class="help-block">
                            {{ $errors->first('SignOnDate') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('Address', 'Address *', ['class' => 'control-label']) !!}
                     {!! Form::textarea('Address', old('Address'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    
                    <p class="help-block"></p>
                    @if($errors->has('Address'))
                        <p class="help-block">
                            {{ $errors->first('Address') }}
                        </p>
                    @endif
                </div>
             </div>
            
            <div class="row">
                <div class="col-md-offset-10 col-xs-2 form-group">
                    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
         {!! Form::close() !!}   
        </div>
    </div>
    
    
@stop


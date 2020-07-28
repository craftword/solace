@extends('layouts.app')

@section('content')
    <h3 class="page-title">Edit Test</h3>
    {!! Form::model($Labs, ['method' => 'PUT', 'route' => ['admin.laboratories.update', $Labs->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-4 form-group">
                    {!! Form::label('LabTestName', 'LabTest Name *', ['class' => 'control-label']) !!}
                    {!! Form::text('LabTestName', old('LabTestName'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('LabTestName'))
                        <p class="help-block">
                            {{ $errors->first('LabTestName') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('Reference', 'Reference *', ['class' => 'control-label']) !!}
                    {!! Form::text('Reference', old('Reference'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Reference'))
                        <p class="help-block">
                            {{ $errors->first('Reference') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('LabCost', 'Lab Cost*', ['class' => 'control-label']) !!}
                     {!! Form::text('LabCost', old('LabCost'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    
                    <p class="help-block"></p>
                    @if($errors->has('LabCost'))
                        <p class="help-block">
                            {{ $errors->first('LabCost') }}
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


@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('admin/procedure') }}">Procedures</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Procedures</li>
  </ol>
</nav>
    <h3 class="page-title">Edit Procedure</h3>
    {!! Form::model($procedures, ['method' => 'PUT', 'route' => ['admin.procedure.update', $procedures->id]]) !!}

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
                    {!! Form::label('Cost', 'Cost *', ['class' => 'control-label']) !!}
                    {!! Form::text('Cost', old('Cost'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Cost'))
                        <p class="help-block">
                            {{ $errors->first('Cost') }}
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


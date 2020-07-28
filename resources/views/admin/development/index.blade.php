@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.talent.index') }}">Talent Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Training And Development</li>

  </ol>
</nav>
    <h3 class="page-title">Talent Management</h3>
    
    
    {!! Form::open(['method' => 'POST', 'route' => ['admin.development.store']]) !!}
           
       
            <div class="panel-body">
                   <div class="row">
                       
                   <div class="col-xs-6 form-group">
                           {!! Form::label('Surname', 'Surname*', ['class' => 'control-label']) !!}
                           {!! Form::text('Surname', old('Surname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('Surname'))
                               <p class="help-block">
                                   {{ $errors->first('Surname') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('FirstName', 'First Name*', ['class' => 'control-label']) !!}
                           {!! Form::text('FirstName', old('FirstName'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('FirstName'))
                               <p class="help-block">
                                   {{ $errors->first('FirstName') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('NeedAssessment', 'Need Assessment*', ['class' => 'control-label']) !!}
                           {!! Form::text('NeedAssessment', old('NeedAssessment'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('NeedAssessment'))
                               <p class="help-block">
                                   {{ $errors->first('NeedAssessment') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('LearningObjectives', 'Learning Objectives*', ['class' => 'control-label']) !!}
                           {!! Form::text('LearningObjectives', old('LearningObjectives'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('LearningObjectives'))
                               <p class="help-block">
                                   {{ $errors->first('LearningObjectives') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('TrainingMode', 'Training Mode*', ['class' => 'control-label']) !!}
                           {!! Form::text('TrainingMode', old('TrainingMode'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('TrainingMode'))
                               <p class="help-block">
                                   {{ $errors->first('TrainingMode') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('TrainingDuration', 'Training Duration*', ['class' => 'control-label']) !!}
                           {!! Form::text('TrainingDuration', old('TrainingDuration'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('TrainingDuration'))
                               <p class="help-block">
                                   {{ $errors->first('TrainingDuration') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('TrainingTimeline', 'Training Timeline*', ['class' => 'control-label']) !!}
                           {!! Form::text('TrainingTimeline', old('TrainingTimeline'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('TrainingTimeline'))
                               <p class="help-block">
                                   {{ $errors->first('TrainingTimeline') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('Year', 'Year*', ['class' => 'control-label']) !!}
                           {!! Form::text('Year', old('Year'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('Year'))
                               <p class="help-block">
                                   {{ $errors->first('Year') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('Budget', 'Budget*', ['class' => 'control-label']) !!}
                           {!! Form::text('Budget', old('Budget'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('Budget'))
                               <p class="help-block">
                                   {{ $errors->first('Budget') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('Evaluation', 'Evaluation*', ['class' => 'control-label']) !!}
                           {!! Form::text('Evaluation', old('Evaluation'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('Evaluation'))
                               <p class="help-block">
                                   {{ $errors->first('Evaluation') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('evaluation_done_by', 'Evaluation Done By*', ['class' => 'control-label']) !!}
                           {!! Form::text('evaluation_done_by', old('evaluation_done_by'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('evaluation_done_by'))
                               <p class="help-block">
                                   {{ $errors->first('evaluation_done_by') }}
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
                   </div>
                   </div>    
           </div>
       @stop

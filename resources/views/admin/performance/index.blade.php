@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.talent.index') }}">Talent Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Performance Appraisal</li>

  </ol>
</nav>
    <h3 class="page-title">Performance Appraisal</h3>
   
    {!! Form::open(['method' => 'POST', 'route' => ['admin.performance.store']]) !!}
           

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Appraisee', 'Appraisee*', ['class' => 'control-label']) !!}
                    {!! Form::text('Appraisee', old('Appraisee'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Appraisee'))
                        <p class="help-block">
                            {{ $errors->first('Appraisee') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Competency', 'Competency*', ['class' => 'control-label']) !!}
                    {!! Form::select('Competency', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Competency'))
                        <p class="help-block">
                            {{ $errors->first('Competency') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Quality Of Work', 'Quality Of Work*', ['class' => 'control-label']) !!}
                    {!! Form::select('QualityOfWork', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('QualityOfWork'))
                        <p class="help-block">
                            {{ $errors->first('QualityOfWork') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Quantity Of Work', 'Quantity Of Work*', ['class' => 'control-label']) !!}
                    {!! Form::select('QuantityOfWork', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('QuantityOfWork'))
                        <p class="help-block">
                            {{ $errors->first('QuantityOfWork') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Organisation', 'Organisation*', ['class' => 'control-label']) !!}
                    {!! Form::select('Organisation', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Organisation'))
                        <p class="help-block">
                            {{ $errors->first('Organisation') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Initiative', 'Initiative*', ['class' => 'control-label']) !!}
                    {!! Form::select('Initiative', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Initiative'))
                        <p class="help-block">
                            {{ $errors->first('Initiative') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Dedication', 'Dedication*', ['class' => 'control-label']) !!}
                    {!! Form::select('Dedication', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Dedication'))
                        <p class="help-block">
                            {{ $errors->first('Dedication') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Problem Solving', 'Problem Solving*', ['class' => 'control-label']) !!}
                    {!! Form::select('ProblemSolving', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ProblemSolving'))
                        <p class="help-block">
                            {{ $errors->first('ProblemSolving') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Creativity', 'Creativity*', ['class' => 'control-label']) !!}
                    {!! Form::select('Creativity', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Creativity'))
                        <p class="help-block">
                            {{ $errors->first('Creativity') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Teamwork', 'Teamwork*', ['class' => 'control-label']) !!}
                    {!! Form::select('Teamwork', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Teamwork'))
                        <p class="help-block">
                            {{ $errors->first('Teamwork') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Interpersonal Skills', 'Interpersonal Skills*', ['class' => 'control-label']) !!}
                    {!! Form::select('InterpersonalSkills', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('InterpersonalSkills'))
                        <p class="help-block">
                            {{ $errors->first('InterpersonalSkills') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('OralCommunication', 'OralCommunication*', ['class' => 'control-label']) !!}
                    {!! Form::select('OralCommunication', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('OralCommunication'))
                        <p class="help-block">
                            {{ $errors->first('OralCommunication') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('VerbalCommunication', 'VerbalCommunication*', ['class' => 'control-label']) !!}
                    {!! Form::select('VerbalCommunication', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('VerbalCommunication'))
                        <p class="help-block">
                            {{ $errors->first('VerbalCommunication') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Emotional Intelligence', 'Emotional Intelligence*', ['class' => 'control-label']) !!}
                    {!! Form::select('EmotionalIntelligence', ['Need Improvement' => 'Need Improvement', 'Satisfactory' => 'Satisfactory', 'Excellent' => 'Excellent'], 'Need Improvement', ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('EmotionalIntelligence'))
                        <p class="help-block">
                            {{ $errors->first('EmotionalIntelligence') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Overall Rating', 'Overall Rating*', ['class' => 'control-label']) !!}
                    {!! Form::text('OverallRating', old('OverallRating'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('OverallRating'))
                        <p class="help-block">
                            {{ $errors->first('OverallRating') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Recommendation', 'Recommendation*', ['class' => 'control-label']) !!}
                    {!! Form::text('Recommendation', old('Recommendation'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Recommendation'))
                        <p class="help-block">
                            {{ $errors->first('Recommendation') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Action Plan', 'Action Plan*', ['class' => 'control-label']) !!}
                    {!! Form::text('ActionPlan', old('ActionPlan'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ActionPlan'))
                        <p class="help-block">
                            {{ $errors->first('ActionPlan') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Appraiser Name', 'Appraiser Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('AppraiserName', old('AppraiserName'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('AppraiserName'))
                        <p class="help-block">
                            {{ $errors->first('AppraiserName') }}
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
    

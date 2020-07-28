@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.talent.index') }}">Talent Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Talent Management</li>  </ol>
</nav>
    <h3 class="page-title">Talent Management</h3>
    <p>
    <a href="{{route('admin.performance.index') }}" class="btn btn-primary">Performance Appraisal</a>
    <a href="{{route('admin.talent.store') }}" class="btn btn-success">Conduct Interview</a> 
    <a href="{{route('admin.development.store') }}" class="btn btn-danger">Training And Development</a> 
    <a href="{{route('admin.promotion.store') }}" class="btn btn-info">Position Cycle</a> 
    <a href="{{url('admin/performance/appraisal') }}" class="btn btn-warning">Salary Life Cycle</a>     
    </p>
    <h3 class="page-title">Conduct Interview</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.talent.store']]) !!}
           
       
            <div class="panel-body">
                   <div class="row">
                   <div class="col-xs-6 form-group">
                           {!! Form::label('Event', 'Event*', ['class' => 'control-label']) !!}
                           {!! Form::select('Event', ['INTERVIEW' => 'INTERVIEW'], 'INTERVIEW', ['class' => 'form-control select2', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('Event'))
                               <p class="help-block">
                                   {{ $errors->first('Event') }}
                               </p>
                           @endif
                       </div>
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
                           {!! Form::label('OtherName', 'Other Name*', ['class' => 'control-label']) !!}
                           {!! Form::text('OtherName', old('OtherName'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('OtherName'))
                               <p class="help-block">
                                   {{ $errors->first('OtherName') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('PositionRequested', 'Position Requested*', ['class' => 'control-label']) !!}
                           {!! Form::text('PositionRequested', old('PositionRequested'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('PositionRequested'))
                               <p class="help-block">
                                   {{ $errors->first('PositionRequested') }}
                               </p>
                           @endif
                           </div>
                           <div class="col-xs-6 form-group">
                           {!! Form::label('Appearance', 'Appearance*', ['class' => 'control-label']) !!}
                           {!! Form::text('Appearance', old('Appearance'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('Appearance'))
                               <p class="help-block">
                                   {{ $errors->first('Appearance') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('Communication', 'Communication*', ['class' => 'control-label']) !!}
                           {!! Form::text('Communication', old('Communication'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('Communication'))
                               <p class="help-block">
                                   {{ $errors->first('Communication') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('WorkExperience', 'Work Experience*', ['class' => 'control-label']) !!}
                           {!! Form::text('WorkExperience', old('WorkExperience'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('WorkExperience'))
                               <p class="help-block">
                                   {{ $errors->first('WorkExperience') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('SkillsAndKnowledge', 'Skills And Knowledge*', ['class' => 'control-label']) !!}
                           {!! Form::text('SkillsAndKnowledge', old('SkillsAndKnowledge'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('SkillsAndKnowledge'))
                               <p class="help-block">
                                   {{ $errors->first('SkillsAndKnowledge') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('Attitude', 'Attitude*', ['class' => 'control-label']) !!}
                           {!! Form::text('Attitude', old('Attitude'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('Attitude'))
                               <p class="help-block">
                                   {{ $errors->first('Attitude') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('Education', 'Education*', ['class' => 'control-label']) !!}
                           {!! Form::text('Education', old('Education'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('Education'))
                               <p class="help-block">
                                   {{ $errors->first('Surname') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('Teachability', 'Teachability*', ['class' => 'control-label']) !!}
                           {!! Form::text('Teachability', old('Teachability'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('Teachability'))
                               <p class="help-block">
                                   {{ $errors->first('Teachability') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('Initiative', 'Initiative*', ['class' => 'control-label']) !!}
                           {!! Form::text('Initiative', old('Initiative'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('Initiative'))
                               <p class="help-block">
                                   {{ $errors->first('Initiative') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('TeamSpirit', 'Team Spirit*', ['class' => 'control-label']) !!}
                           {!! Form::text('TeamSpirit', old('TeamSpirit'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('TeamSpirit'))
                               <p class="help-block">
                                   {{ $errors->first('TeamSpirit') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('StrengthAndWeakness', 'Strength And Weakness*', ['class' => 'control-label']) !!}
                           {!! Form::text('StrengthAndWeakness', old('StrengthAndWeakness'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('StrengthAndWeakness'))
                               <p class="help-block">
                                   {{ $errors->first('StrengthAndWeakness') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('ActionPlan', 'Action Plan*', ['class' => 'control-label']) !!}
                           {!! Form::text('ActionPlan', old('ActionPlan'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('ActionPlan'))
                               <p class="help-block">
                                   {{ $errors->first('ActionPlan') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('CareerGoal', 'Career Goal*', ['class' => 'control-label']) !!}
                           {!! Form::text('CareerGoal', old('CareerGoal'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('CareerGoal'))
                               <p class="help-block">
                                   {{ $errors->first('CareerGoal') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('SalaryExpectation', 'Salary Expectation*', ['class' => 'control-label']) !!}
                           {!! Form::text('SalaryExpectation', old('SalaryExpectation'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('SalaryExpectation'))
                               <p class="help-block">
                                   {{ $errors->first('SalaryExpectation') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('interview_done_by', 'Interview Done By*', ['class' => 'control-label']) !!}
                           {!! Form::text('interview_done_by', old('interview_done_by'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('interview_done_by'))
                               <p class="help-block">
                                   {{ $errors->first('interview_done_by') }}
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

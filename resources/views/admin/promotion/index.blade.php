@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.talent.index') }}">Talent Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Position Cycle</li>

  </ol>
</nav>
    <h3 class="page-title">Position Life Cycle</h3>
    
    
    {!! Form::open(['method' => 'POST', 'route' => ['admin.promotion.store']]) !!}
           
       
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
                           {!! Form::label('StartingPosition', 'Starting Position*', ['class' => 'control-label']) !!}
                           {!! Form::text('StartingPosition', old('StartingPosition'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('StartingPosition'))
                               <p class="help-block">
                                   {{ $errors->first('StartingPosition') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('CurrentPosition', 'Current Position*', ['class' => 'control-label']) !!}
                           {!! Form::text('CurrentPosition', old('CurrentPosition'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('CurrentPosition'))
                               <p class="help-block">
                                   {{ $errors->first('CurrentPosition') }}
                               </p>
                           @endif
                       </div>
                       <div class="col-xs-6 form-group">
                           {!! Form::label('DateOfPromotion', 'DateOfPromotion*', ['class' => 'control-label']) !!}
                           {!! Form::text('DateOfPromotion', old('DateOfPromotion'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                           <p class="help-block"></p>
                           @if($errors->has('DateOfPromotion'))
                               <p class="help-block">
                                   {{ $errors->first('DateOfPromotion') }}
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

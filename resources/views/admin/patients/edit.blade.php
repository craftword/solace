@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.patients.index') }}">Patients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Patient</li>
  </ol>
</nav>
<<<<<<< HEAD
@if($patient->RegistrationType == 'FAMILY')
    @if(count($member) < 1)
      <div class="row alert alert-block">
            <h5> Please add patient to a family </h5>
             {!! Form::open(['method' => 'POST', 'url' => ['admin/addMemberToFamily']]) !!}
             <div class="col-xs-3 form-group">
              {!! Form::select('famId', $families, 'null', ['class' => 'form-control ',  'required' => '']) !!}
             </div>
             <div class="col-xs-2 form-group">
                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::hidden('pId', $patient->id) !!}
             {!! Form::close() !!}  
       </div>
    @endif    
@endif  
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    <h3 class="page-title">Edit Patient </h3>
    
    {!! Form::model($patient, ['method' => 'PUT', 'route' => ['admin.patients.update', $patient->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Surname', 'Surname*', ['class' => 'control-label']) !!}
                    {!! Form::text('Surname', old('Surname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lastname'))
                        <p class="help-block">
                            {{ $errors->first('Surname') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Firstname', 'Firstname*', ['class' => 'control-label']) !!}
                    {!! Form::text('Firstname', old('Firstname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Firstname'))
                        <p class="help-block">
                            {{ $errors->first('Firstname') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Middlename', 'Middlename*', ['class' => 'control-label']) !!}
                    {!! Form::text('Middlename', old('Middlename'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Middlename'))
                        <p class="help-block">
                            {{ $errors->first('Middlename') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('PhoneNumber', 'Phone Number*', ['class' => 'control-label']) !!}
                    {!! Form::text('PhoneNumber', old('PhoneNumber'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('PhoneNumber'))
                        <p class="help-block">
                            {{ $errors->first('PhoneNumber') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('Email', old('Email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Email'))
                        <p class="help-block">
                            {{ $errors->first('Email') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Sex', 'Sex*', ['class' => 'control-label']) !!}
<<<<<<< HEAD
                    {!! Form::select('Sex', ['Male' => 'Male', 'Female' => 'Female'], 'Null', ['class' => 'form-control select2',  'required' => '']) !!}
=======
                    {!! Form::select('Sex', ['Male' => 'Male', 'Female' => 'Female'], 'Male', ['class' => 'form-control select2',  'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    <p class="help-block"></p>
                    @if($errors->has('Sex'))
                        <p class="help-block">
                            {{ $errors->first('Sex') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('Address', 'Address*', ['class' => 'control-label']) !!}
                    {!! Form::text('Address', old('Address'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Address'))
                        <p class="help-block">
                            {{ $errors->first('Address') }}
                        </p>
                    @endif
                </div>
            </div>
             <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('StateOfOrigin', 'State Of Origin*', ['class' => 'control-label']) !!}
                    {!! Form::text('StateOfOrigin', old('StateOfOrigin'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('StateOfOrigin'))
                        <p class="help-block">
                            {{ $errors->first('StateOfOrigin') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Marital Status', 'Marital Status *', ['class' => 'control-label']) !!}
                    {!! Form::select('Nationality', ['Married' => 'Married', 'Single' => 'Single', 'Divorced' => 'Divorced', 'Widow' => 'Widow'], 'Married', ['class' => 'form-control select2',  'required' => '']) !!}
                    
                    <p class="help-block"></p>
                    @if($errors->has('Nationality'))
                        <p class="help-block">
                            {{ $errors->first('Nationality') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Religion', 'Religion*', ['class' => 'control-label']) !!}
                    {!! Form::text('Religion', old('Religion'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Religion'))
                        <p class="help-block">
                            {{ $errors->first('Religion') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                   {!! Form::label('Occupation', 'Occupation*', ['class' => 'control-label']) !!}
                    {!! Form::text('Occupation', old('Occupation'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Occupation'))
                        <p class="help-block">
                            {{ $errors->first('Occupation') }}
                        </p>
                    @endif 
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Birthdate', 'Date of Birth*', ['class' => 'control-label']) !!}
<<<<<<< HEAD
                    {!! Form::date('Birthdate', old('Birthdate'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
=======
                    {!! Form::date('Birthdate', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    <p class="help-block"></p>
                    @if($errors->has('Birthdate '))
                        <p class="help-block">
                            {{ $errors->first('Birthdate ') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                   {!! Form::label('RegistrationType', 'RegistrationType*', ['class' => 'control-label']) !!}
<<<<<<< HEAD
                    {!! Form::select('RegistrationType',  ['HMO' => 'HMO', 'ANC' => 'ANC', 'PRIVATE' => 'PRIVATE', 'UNREGISTER PATIENT' => 'UNREGISTER PATIENT', 'FAMILY' => 'FAMILY', 'EMERGENCY' => 'EMERGENCY'], null, ['class' => 'form-control','placeholder' => 'Pick a Type...']); !!}
=======
                    {!! Form::text('RegistrationType', old('RegistrationType'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    <p class="help-block"></p>
                    @if($errors->has('RegistrationType'))
                        <p class="help-block">
                            {{ $errors->first('RegistrationType') }}
                        </p>
                    @endif 
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('NextOfKin', 'Next Of Kin*', ['class' => 'control-label']) !!}
                    {!! Form::text('NextOfKin', old('NextOfKin'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('NextOfKin'))
                        <p class="help-block">
                            {{ $errors->first('NextOfKin') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                   {!! Form::label('NextOfKinPhone', 'Next Of Kin Phone *', ['class' => 'control-label']) !!}
                    {!! Form::text('NextOfKinPhone', old('NextOfKinPhone'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('NextOfKinPhone '))
                        <p class="help-block">
                            {{ $errors->first('NextOfKinPhone') }}
                        </p>
                    @endif 
                </div>
            </div>
             <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('NextOfKinAddress', 'Next Of Kin Address*', ['class' => 'control-label']) !!}
                    {!! Form::text('NextOfKinAddress', old('NextOfKinAddress'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('NextOfKinAddress'))
                        <p class="help-block">
                            {{ $errors->first('NextOfKinAddress') }}
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


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
    <li class="breadcrumb-item"><a href="{{ route('admin.humanresource.index') }}">Staff List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Staff</li>
  </ol>
</nav>
    <h3 class="page-title">Add New Staff</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.humanresource.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3 form-group">
                    {!! Form::label('TITLE', 'TITLE*', ['class' => 'control-label']) !!}
                    {!! Form::text('TITLE', old('TITLE'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('TITLE'))
                        <p class="help-block">
                            {{ $errors->first('TITLE') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-3 form-group">
                    {!! Form::label('SURNAME', 'SURNAME *', ['class' => 'control-label']) !!}
                    {!! Form::text('SURNAME', old('SURNAME'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('SURNAME'))
                        <p class="help-block">
                            {{ $errors->first('SURNAME') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-3 form-group">
                    {!! Form::label('FIRSTNAME', 'FIRSTNAME *', ['class' => 'control-label']) !!}
                    {!! Form::text('FIRSTNAME', old('FIRSTNAME'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('FIRSTNAME'))
                        <p class="help-block">
                            {{ $errors->first('FIRSTNAME') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-3 form-group">
                    {!! Form::label('OTHERNAME', 'OTHERNAME *', ['class' => 'control-label']) !!}
                    {!! Form::text('OTHERNAME', old('OTHERNAME'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('OTHERNAME'))
                        <p class="help-block">
                            {{ $errors->first('OTHERNAME') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    {!! Form::label('SEX', 'SEX *', ['class' => 'control-label']) !!}
                    {!! Form::select('SEX', ['male'=>'male', 'female'=>'female'], null, ['class' => 'form-control',]); !!}
                    
                    <p class="help-block"></p>
                    @if($errors->has('SEX'))
                        <p class="help-block">
                            {{ $errors->first('SEX') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('DATEOFBIRTH', 'DATE OF BIRTH*', ['class' => 'control-label']) !!}
                   {!! Form::date('DATEOFBIRTH', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('DATEOFBIRTH'))
                        <p class="help-block">
                            {{ $errors->first('DATEOFBIRTH') }}
                        </p>
                    @endif
                </div>
                  <div class="col-xs-4 form-group">
                    {!! Form::label('MARITALSTATUS', 'MARITAL STATUS *', ['class' => 'control-label']) !!}
                    {!! Form::select('MARITALSTATUS', ['Married'=>'Married', 'Single'=>'Single', 'Divorced'=>'Divorced'], null, ['class' => 'form-control',]); !!}
                    
                    <p class="help-block"></p>
                    @if($errors->has('MARITALSTATUS'))
                        <p class="help-block">
                            {{ $errors->first('MARITALSTATUS') }}
                        </p>
                    @endif
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                    {!! Form::label('PERMANENTHOMEADDRESS ', 'PERMANENT HOME ADDRESS *', ['class' => 'control-label']) !!}
                    {!! Form::text('PERMANENTHOMEADDRESS', old('PERMANENTHOMEADDRESS'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('PERMANENTHOMEADDRESS'))
                        <p class="help-block">
                            {{ $errors->first('PERMANENTHOMEADDRESS') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('PRESENTRESIDENTIALADDRESS', 'PRESENT RESIDENTIAL ADDRESS*', ['class' => 'control-label']) !!}
                    {!! Form::text('PRESENTRESIDENTIALADDRESS', old('PRESENTRESIDENTIALADDRESS'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('PRESENTRESIDENTIALADDRESS'))
                        <p class="help-block">
                            {{ $errors->first('PRESENTRESIDENTIALADDRESS') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('JOBDESCRIPTION', 'JOB DESCRIPTION *', ['class' => 'control-label']) !!}
                    {!! Form::select('JOBDESCRIPTION', ['Doctor'=>'Doctor', 'Nurse'=>'Nurse', 'Front Desk Officer'=>'Front Desk Officer', 'Facility Manager'=>'Facility Manager','Account Officer'=>'Account Officer','Cashier'=>'Cashier','Cleaner'=>'Cleaner','Security'=>'Security','Laboratory Technician'=>'Laboratory Technician',], null, ['class' => 'form-control',]); !!}
                    
                    <p class="help-block"></p>
                    @if($errors->has('JOBDESCRIPTION'))
                        <p class="help-block">
                            {{ $errors->first('JOBDESCRIPTION') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                        {!! Form::label('EMAIL', 'EMAIL*', ['class' => 'control-label']) !!}
                        {!! Form::text('EMAIL', old('EMAIL'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('EMAIL'))
                            <p class="help-block">
                                {{ $errors->first('EMAIL') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('PHONENUMMBERS', 'PHONE NUMMBERS*', ['class' => 'control-label']) !!}
                        {!! Form::text('PHONENUMMBERS', old('PHONENUMMBERS'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('PHONENUMMBERS'))
                            <p class="help-block">
                                {{ $errors->first('PHONENUMMBERS') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('STATEOFORIGIN', 'STATE OF ORIGIN*', ['class' => 'control-label']) !!}
                        {!! Form::text('STATEOFORIGIN', old('STATEOFORIGIN'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('STATEOFORIGIN'))
                            <p class="help-block">
                                {{ $errors->first('STATEOFORIGIN') }}
                            </p>
                        @endif
                    </div>
                    
                
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                        {!! Form::label('POSITIONINTHEORGANISATION', 'POSITION IN THE ORGANISATION*', ['class' => 'control-label']) !!}
                        {!! Form::text('POSITIONINTHEORGANISATION', old('POSITIONINTHEORGANISATION'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('POSITIONINTHEORGANISATION'))
                            <p class="help-block">
                                {{ $errors->first('POSITIONINTHEORGANISATION') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-4 form-group">
                        {!! Form::label('QUALIFICATIONS', 'QUALIFICATIONS *', ['class' => 'control-label']) !!}
                        {!! Form::text('QUALIFICATIONS', old('QUALIFICATIONS'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('QUALIFICATIONS'))
                            <p class="help-block">
                                {{ $errors->first('QUALIFICATIONS') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-4 form-group">
                        {!! Form::label('DATEOFEMPLOYMENT', 'DATE OF EMPLOYMENT*', ['class' => 'control-label']) !!}
                        {!! Form::date('DATEOFEMPLOYMENT', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('DATEOFEMPLOYMENT'))
                            <p class="help-block">
                                {{ $errors->first('DATEOFEMPLOYMENT') }}
                            </p>
                        @endif
                    </div>                    
            </div>
             <div class="row">
                <div class="col-xs-4 form-group">
                        {!! Form::label('NAMEOFNEXTOFKIN', 'NAME OF NEXT OF KIN *', ['class' => 'control-label']) !!}
                        {!! Form::text('NAMEOFNEXTOFKIN', old('NAMEOFNEXTOFKIN'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('NAMEOFNEXTOFKIN'))
                            <p class="help-block">
                                {{ $errors->first('NAMEOFNEXTOFKIN') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('ADDRESSOFNEXTOFKIN', '	ADDRESS OF NEXT OF KIN*', ['class' => 'control-label']) !!}
                        {!! Form::text('ADDRESSOFNEXTOFKIN', old('ADDRESSOFNEXTOFKIN'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('ADDRESSOFNEXTOFKIN'))
                            <p class="help-block">
                                {{ $errors->first('ADDRESSOFNEXTOFKIN') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('DATEOFPROMOTIONS', 'DATE OF PROMOTIONS*', ['class' => 'control-label']) !!}
                        {!! Form::date('DATEOFPROMOTIONS', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('DATEOFPROMOTIONS'))
                            <p class="help-block">
                                {{ $errors->first('DATEOFPROMOTIONS') }}
                            </p>
                        @endif
                    </div>
                    
                
            </div>
             <div class="row">
                <div class="col-xs-4 form-group">
                        {!! Form::label('DATEOFINTERVIEW', 'DATE OF INTERVIEW*', ['class' => 'control-label']) !!}
                       {!! Form::date('DATEOFINTERVIEW', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('DATEOFINTERVIEW'))
                            <p class="help-block">
                                {{ $errors->first('DATEOFINTERVIEW') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('INTERVIEWCONDUCTEDBY', '	INTERVIEW CONDUCTED BY*', ['class' => 'control-label']) !!}
                        {!! Form::text('INTERVIEWCONDUCTEDBY', old('INTERVIEWCONDUCTEDBY'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('INTERVIEWCONDUCTEDBY'))
                            <p class="help-block">
                                {{ $errors->first('INTERVIEWCONDUCTEDBY') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('ORIENTATIONPERIOD', 'ORIENTATION PERIOD*', ['class' => 'control-label']) !!}
                        {!! Form::text('ORIENTATIONPERIOD', old('ORIENTATIONPERIOD'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('ORIENTATIONPERIOD'))
                            <p class="help-block">
                                {{ $errors->first('ORIENTATIONPERIOD') }}
                            </p>
                        @endif
                    </div>                   
                
            </div>
             <div class="row">
                <div class="col-xs-4 form-group">
                        {!! Form::label('ORIENTATIONCONDUCTEDBY', 'ORIENTATION CONDUCTED BY*', ['class' => 'control-label']) !!}
                        {!! Form::text('ORIENTATIONCONDUCTEDBY', old('ORIENTATIONCONDUCTEDBY'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('ORIENTATIONCONDUCTEDBY'))
                            <p class="help-block">
                                {{ $errors->first('ORIENTATIONCONDUCTEDBY') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('STARTINGSALARY', 'STARTING SALARY*', ['class' => 'control-label']) !!}
                        {!! Form::text('STARTINGSALARY', old('STARTINGSALARY'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('STARTINGSALARY'))
                            <p class="help-block">
                                {{ $errors->first('STARTINGSALARY') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('SALARYINCREASE', 'SALARY INCREASE*', ['class' => 'control-label']) !!}
                        {!! Form::text('SALARYINCREASE', old('SALARYINCREASE'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('SALARYINCREASE'))
                            <p class="help-block">
                                {{ $errors->first('SALARYINCREASE') }}
                            </p>
                        @endif
                    </div>                
                
            </div>
             <div class="row">
                <div class="col-xs-4 form-group">
                        {!! Form::label('DATEOFSALARYINCREASE', 'DATE OF SALARY INCREASE*', ['class' => 'control-label']) !!}
                         {!! Form::date('DATEOFSALARYINCREASE', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('DATEOFSALARYINCREASE'))
                            <p class="help-block">
                                {{ $errors->first('DATEOFSALARYINCREASE') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('SALARYDEDUCTION', 'SALARY DEDUCTION*', ['class' => 'control-label']) !!}
                        {!! Form::text('SALARYDEDUCTION', old('SALARYDEDUCTION'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('SALARYDEDUCTION'))
                            <p class="help-block">
                                {{ $errors->first('SALARYDEDUCTION') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('SALARYADVANCE', 'SALARY ADVANCE*', ['class' => 'control-label']) !!}
                        {!! Form::text('SALARYADVANCE', old('SALARYADVANCE'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('SALARYADVANCE'))
                            <p class="help-block">
                                {{ $errors->first('SALARYADVANCE') }}
                            </p>
                        @endif
                    </div>                
                
            </div>
             <div class="row">
                <div class="col-xs-4 form-group">
                        {!! Form::label('SALARYADVANCEDURATION', 'SALARY ADVANCE DURATION *', ['class' => 'control-label']) !!}
                        {!! Form::text('SALARYADVANCEDURATION', old('SALARYADVANCEDURATION'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('SALARYADVANCEDURATION'))
                            <p class="help-block">
                                {{ $errors->first('SALARYADVANCEDURATION') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                          {!! Form::label('EMPLOYMENTSTATUS', 'EMPLOYMENT STATUS*', ['class' => 'control-label']) !!}                      
                          {!! Form::select('EMPLOYMENTSTATUS', ['ACTIVE'=>'ACTIVE', 'RESIGNED'=>'RESIGNED'], null, ['class' => 'form-control',]); !!}
                        <p class="help-block"></p>
                        @if($errors->has('EMPLOYMENTSTATUS'))
                            <p class="help-block">
                                {{ $errors->first('EMPLOYMENTSTATUS') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('WORKHOUR', 'WORK HOUR*', ['class' => 'control-label']) !!}
                        {!! Form::text('WORKHOUR', old('WORKHOUR'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('WORKHOUR'))
                            <p class="help-block">
                                {{ $errors->first('WORKHOUR') }}
                            </p>
                        @endif
                    </div>                
                
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                        {!! Form::label('BANKNAME', 'BANK NAME *', ['class' => 'control-label']) !!}
                        {!! Form::text('BANKNAME', old('BANKNAME'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('BANKNAME'))
                            <p class="help-block">
                                {{ $errors->first('BANKNAME') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('ACCOUNTNAME', 'ACCOUNT NAME*', ['class' => 'control-label']) !!}
                        {!! Form::text('ACCOUNTNAME', old('ACCOUNTNAME'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('ACCOUNTNAME'))
                            <p class="help-block">
                                {{ $errors->first('ACCOUNTNAME') }}
                            </p>
                        @endif
                    </div>
                <div class="col-xs-4 form-group">
                        {!! Form::label('ACCOUNTNUMBER', 'ACCOUNT NUMBER*', ['class' => 'control-label']) !!}
                        {!! Form::text('ACCOUNTNUMBER', old('ACCOUNTNUMBER'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('ACCOUNTNUMBER'))
                            <p class="help-block">
                                {{ $errors->first('ACCOUNTNUMBER') }}
                            </p>
                        @endif
                    </div>                
                
            </div>
            <div class="row">
                <div class="col-xs-4 form-group">
                        {!! Form::label('TAX', 'TAX *', ['class' => 'control-label']) !!}
                        {!! Form::text('TAX', old('TAX'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('TAX'))
                            <p class="help-block">
                                {{ $errors->first('TAX') }}
                            </p>
                        @endif
                 </div>     
                 <div class="col-xs-4 form-group">
                        {!! Form::label('TAXID', 'TAX  ID*', ['class' => 'control-label']) !!}
                        {!! Form::text('TAXID', old('TAXID'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('TAXID'))
                            <p class="help-block">
                                {{ $errors->first('TAXID') }}
                            </p>
                        @endif
                 </div>     
                <div class="col-md-offset-2 col-xs-2 form-group">
                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
         {!! Form::close() !!}   
        </div>
    </div>
    
    
@stop


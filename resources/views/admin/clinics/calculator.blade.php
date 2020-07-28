@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Medical Calculator</li>
  </ol>
</nav>
    <h2 class="page-title">Medical Calculator</h2>
    <div class="row">
        <div class="col-md-offset-6 col-xs-6 form-group">
            {!! Form::text('result', old('result'), ['class' => 'form-control result', 'style' => 'font-size:36px; font-weight:bold; height:48px; color:red;']) !!}
        </div>
    </div>
    <p> </p>   

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Infusion/Blood Rate Calculator</h3>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Fluid Volume ', 'Fluid Volume *', ['class' => 'control-label']) !!}
                    {!! Form::text('Volume', old('Volume'), ['class' => 'form-control volume', 'placeholder' => 'Fluid Volume', 'required' => '']) !!}
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Duration', 'Fluid Duration *', ['class' => 'control-label']) !!}
                    {!! Form::text('Duration', old('Duration'), ['class' => 'form-control duration', 'placeholder' => 'Duration', 'required' => '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-xs-3 form-group">
                   <button class="btn btn-primary fluidRate">
                        Calculate Fluid Rate
                   </button>
                </div>
                <div class="col-md-offset-1 col-xs-3 form-group">
                    <button class="btn btn-primary bloodRate">
                         Calculate Blood Rate
                    </button>
                 </div>
                 <div class="col-md-offset-1 col-xs-3 form-group">
                    <button class="btn btn-primary solusetRate">
                         Calculate Soluset Rate
                    </button>
                 </div>
            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Liquid Medication Volume Calculator/ Dose Calculator / BMI Calculator</h3>
        </div>
        
        <div class="panel-body">
        <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Weight', 'Weight *', ['class' => 'control-label']) !!}
                    {!! Form::text('Weight', old('Weight'), ['class' => 'form-control weight', 'placeholder' => 'Weight', 'required' => '']) !!}
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Dose', 'Dose *', ['class' => 'control-label']) !!}
                    {!! Form::text('Dose', old('Dose'), ['class' => 'form-control dose', 'placeholder' => 'Dose', 'required' => '']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Syrup/Inj Conc', 'Syrup/Inj Conc *', ['class' => 'control-label']) !!}
                    {!! Form::text('Syrup/Inj Conc', old('Syrup/Inj Conc'), ['class' => 'form-control conc', 'placeholder' => 'Syrup/Inj Conc', 'required' => '']) !!}
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Syrup/Inj Volume', 'Syrup/Inj Volume *', ['class' => 'control-label']) !!}
                    {!! Form::text('Syrup/Inj Volume', old('Syrup/Inj Volume'), ['class' => 'form-control injVol', 'placeholder' => 'Syrup/Inj Volume', 'required' => '']) !!}
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Height', 'Height *', ['class' => 'control-label']) !!}
                    {!! Form::text('Height', old('Height'), ['class' => 'form-control height', 'placeholder' => 'Height', 'required' => '']) !!}
                </div>
            </div>
            <div class="row">
            <div class="col-md-offset-1 col-xs-3 form-group">
                   <button class="btn btn-primary doseCal">
                        Calculate Dose
                   </button>
                </div>
                <div class="col-md-offset-1 col-xs-3 form-group">
                   <button class="btn btn-primary injBtn">
                        Calculate Syrup/Injection Volume
                   </button>
                </div>
                <div class="col-md-offset-1 col-xs-3 form-group">
                   <button class="btn btn-primary bmi">
                        Calculate Body Mass Index
                   </button>
                </div>
            </div>

        </div>
    </div>


@stop

@section('javascript')
    <script>
        // Dose Calculator
         $('.doseCal').on('click', function(e) {
            e.preventDefault();
            $('.result').val('');
            try {
                var cal = parseFloat($('.weight').val()) * parseFloat($('.dose').val());
                $('.result').val(cal.toString()  + " mg");
                $('.result').focus();
            }
            catch(ex) {
                throw ex;
            }
         });

        // Fluid Rate Calculator
        $('.fluidRate').on('click', function(e) {
            e.preventDefault();
            $('.result').val('');
            try {
                var cal = (parseInt($('.volume').val()) * 0.33) / parseInt($('.duration').val());
                $('.result').val(cal.toString()  + " drops/min");
                $('.result').focus();
            }
            catch(ex) {
                throw ex;
            }
         });

         // Blood Rate Calculator
        $('.bloodRate').on('click', function(e) {
            e.preventDefault();
            $('.result').val('');
            try {
                var cal = (parseInt($('.volume').val()) * 0.25) / parseInt($('.duration').val());
                $('.result').val(cal.toString()  + " drops/min");
                $('.result').focus();
            }
            catch(ex) {
                throw ex;
            }
         });
          // Soluset Rate Calculator
        $('.solusetRate').on('click', function(e) {
            e.preventDefault();
            $('.result').val('');
            try {
                var cal = parseInt($('.volume').val())  / parseInt($('.duration').val());
                $('.result').val(cal.toString() + " drops/min");
                $('.result').focus();
            }
            catch(ex) {
                throw ex;
            }
         });

         // Syrup and Injection Rate Calculator
        $('.injBtn').on('click', function(e) {
            e.preventDefault();
            $('.result').val('');
            try {
                var cal =(parseInt($('.weight').val()) * parseInt($('.dose').val()) * parseInt($('.injVol').val())) / parseInt($('.conc').val());
                $('.result').val(cal.toString()  + " ml");
                $('.result').focus();
            }
            catch(ex) {
                throw ex;
            }
         });
         // BMI Calculator
         $('.bmi').on('click', function(e) {
            e.preventDefault();
            $('.result').val('');
            try {
                var cal = parseInt($('.weight').val()) / parseFloat($('.height').val()) / parseFloat($('.height').val());
                $('.result').val(cal.toString()  + " Kg/m2");
                $('.result').focus();
            }
            catch(ex) {
                throw ex;
            }
         });

    </script>
@endsection
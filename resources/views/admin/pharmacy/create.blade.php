@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.pharmacy.index') }}">Pharmacy</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Pharmacy</li>
  </ol>
</nav>
    <h3 class="page-title">Add New Drug</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.pharmacy.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('DrugName', 'Drug Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('DrugName', old('DrugName'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('DrugName'))
                        <p class="help-block">
                            {{ $errors->first('DrugName') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('BrandName', 'Brand Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('BrandName', old('BrandName'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('BrandName'))
                        <p class="help-block">
                            {{ $errors->first('BrandName') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('DrugType', 'Drug Type*', ['class' => 'control-label']) !!}
<<<<<<< HEAD
                    {!! Form::select('DrugType', ['tab'=>'tab', 'bottle'=>'bottle','ampenle'=>'ampenle','vial'=>'vial','tube'=>'tube','nebule'=>'nebule','pint'=>'pint','bag'=>'bag','pack'=>'pack','roll'=>'roll', 'cap'=>'cap', 'needle'=>'needle' , 'syringe'=>'syringe', 'pair'=>'pair', 'strip'=> 'strip', 'cup'=> 'cup', 'envelop'=> 'envelop'], null, ['class' => 'form-control','placeholder' => 'Pick a Type...']); !!}
=======
                    {!! Form::select('DrugType', ['tab'=>'tab', 'bottle'=>'bottle','ampenle'=>'ampenle','vial'=>'vial','tube'=>'tube','nebule'=>'nebule','pint'=>'pint','bag'=>'bag','pack'=>'pack','roll'=>'roll'], null, ['class' => 'form-control','placeholder' => 'Pick a Type...']); !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    
                    <p class="help-block"></p>
                    @if($errors->has('DrugType'))
                        <p class="help-block">
                            {{ $errors->first('DrugType') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('UnitQuantity', 'Unit Quantity*', ['class' => 'control-label']) !!}
                    {!! Form::text('UnitQuantity', old('UnitQuantity'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('UnitQuantity'))
                        <p class="help-block">
                            {{ $errors->first('UnitQuantity') }}
                        </p>
                    @endif
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('UnitCost ', 'Unit Cost *', ['class' => 'control-label']) !!}
                    {!! Form::text('UnitCost', old('UnitCost'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('UnitCost'))
                        <p class="help-block">
                            {{ $errors->first('UnitCost') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('BatchNumber', 'Batch Number*', ['class' => 'control-label']) !!}
                    {!! Form::text('BatchNumber', old('BatchNumber'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('BatchNumber'))
                        <p class="help-block">
                            {{ $errors->first('BatchNumber') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('ExpiryDate', 'Expiry Date*', ['class' => 'control-label']) !!}
                    {!! Form::date('ExpiryDate', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ExpiryDate'))
                        <p class="help-block">
                            {{ $errors->first('ExpiryDate') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('PurchaseDate', 'Purchase Date*', ['class' => 'control-label']) !!}
                   {!! Form::date('PurchaseDate', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('PurchaseDate'))
                        <p class="help-block">
                            {{ $errors->first('PurchaseDate') }}
                        </p>
                    @endif
                </div>
<<<<<<< HEAD
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                        {!! Form::label('MinStock', 'Minimum Stock*', ['class' => 'control-label']) !!}
                        {!! Form::text('minStock', old('minStock'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('minStock'))
                            <p class="help-block">
                                {{ $errors->first('minStock') }}
                            </p>
                        @endif
                    </div>
                    
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            </div>                      
            <div class="row">
                <div class="col-md-offset-10 col-xs-2 form-group">
                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
         {!! Form::close() !!}   
        </div>
    </div>
    
    
@stop


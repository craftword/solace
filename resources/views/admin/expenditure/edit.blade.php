@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.expenditure.index') }}">Expenditure</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Expenditure</li>
  </ol>
</nav>
    <h3 class="page-title">Add New Expenditure</h3>
      {!! Form::model($expenditures, ['method' => 'PUT', 'route' => ['admin.expenditure.update', $expenditures->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('ItemName', 'Item Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('Itemname', old('Itemname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Itemname'))
                        <p class="help-block">
                            {{ $errors->first('Itemname') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Vendor', 'Supplier / Vendor*', ['class' => 'control-label']) !!}
                    {!! Form::text('Vendor', old('Vendor'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Vendor'))
                        <p class="help-block">
                            {{ $errors->first('Vendor') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Quantity', 'Quantity*', ['class' => 'control-label']) !!}
                    {!! Form::text('Quantity', old('Quantity'), ['class' => 'form-control qxy', 'placeholder' => '', 'required' => '']) !!}
                    
                    <p class="help-block"></p>
                    @if($errors->has('Quantity'))
                        <p class="help-block">
                            {{ $errors->first('Quantity') }}
                        </p>
                    @endif
                </div>
               
                <div class="col-xs-6 form-group">
                    {!! Form::label('Totalcost ', 'Totalcost *', ['class' => 'control-label']) !!}
                    {!! Form::text('Totalcost', old('Totalcost'), ['class' => 'form-control total', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Totalcost'))
                        <p class="help-block">
                            {{ $errors->first('Totalcost') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                 <div class="col-xs-6 form-group">
                    {!! Form::label('Cost', 'Unit Cost*', ['class' => 'control-label']) !!}
                    {!! Form::text('Cost', old('Cost'), ['class' => 'form-control cost', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Cost'))
                        <p class="help-block">
                            {{ $errors->first('Cost') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Staffname', 'Staff Name', ['class' => 'control-label']) !!}
                    {!! Form::text('Staffname', old('Staffname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Staffname'))
                        <p class="help-block">
                            {{ $errors->first('Staffname') }}
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



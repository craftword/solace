@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Requisition</li>
  </ol>
</nav>
@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
			</div>
	@endif

    <h3 class="page-title">Requisition</h3>
      
    <div class="panel panel-default">
        <div class="panel-heading">
            Add New Requisition
        </div>

        <div class="panel-body">
        {!! Form::model($reqs, ['method' => 'PUT', 'route' => ['admin.requisition.update', $reqs->id]]) !!}

		              <div class="row">
                          <div class="col-xs-6 form-group">
                            {!! Form::label('ItemName', 'ItemName *', ['class' => 'control-label']) !!}
                            {!! Form::text('ItemName', old('ItemName'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('ItemName'))
                                <p class="help-block">
                                    {{ $errors->first('ItemName') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-xs-6 form-group">
                            {!! Form::label('QuantityNeeded', '	QuantityNeeded *', ['class' => 'control-label']) !!}
                            {!! Form::text('QuantityNeeded', old('QuantityNeeded'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('QuantityNeeded'))
                                <p class="help-block">
                                    {{ $errors->first('QuantityNeeded') }}
                                </p>
                            @endif
                        </div>               			
						<div class="col-xs-6 form-group">
                              {!! Form::label('QuantityApproved', '	QuantityApproved *', ['class' => 'control-label']) !!}
                              {!! Form::text('QuantityApproved', old('QuantityApproved'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                              <p class="help-block"></p>
                              @if($errors->has(QuantityApproved))
                                  <p class="help-block">
                                      {{ $errors->first('QuantityApproved') }}
                                  </p>
                              @endif
                          </div>	         					            	
                                               
					{!! Form::close() !!}
				            </div>
            
        </div>
    </div>

    @stop
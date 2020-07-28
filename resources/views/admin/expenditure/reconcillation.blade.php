@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Bank Reconciliation</li>
  </ol>
</nav>
    <h3 class="page-title">Bank Reconciliation</h3>

    <p> </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Create New Reconciliation</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'url' => 'admin/reconcillations']) !!}
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('Name', 'Patient Name *', ['class' => 'control-label']) !!}
                    {!! Form::text('Name', old('Name'), ['class' => 'form-control', 'placeholder' => 'Fullname', 'required' => '']) !!}
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Amount', 'Amount *', ['class' => 'control-label']) !!}
                    {!! Form::text('Amount', old('Amount'), ['class' => 'form-control', 'placeholder' => 'Amount', 'required' => '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('ReferenceNumber', 'Reference Number *', ['class' => 'control-label']) !!}
                    {!! Form::text('ReferenceNumber', old('ReferenceNumber'), ['class' => 'form-control weight', 'placeholder' => 'Reference Number', 'required' => '']) !!}
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('PaymentType', 'Payment Type *', ['class' => 'control-label']) !!}
                    {!! Form::select('PaymentType', ['POS' => 'POS', 'CHEQUE' => 'CHEQUE', 'TRANSFER'=>'TRANSFER'], 'POS', ['class' => 'form-control', 'required' => '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('PaymentStatus', 'Payment Status *', ['class' => 'control-label']) !!}
                    {!! Form::select('PaymentStatus', ['Pending' => 'Pending', 'Failed' => 'Failed'], 'Pending', ['class' => 'form-control', 'required' => '']) !!}
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('RegistrationType', 'Registration Type *', ['class' => 'control-label']) !!}
                    {!! Form::select('RegistrationType', ['Registered' => 'Registered', 'UnRegistered' => 'UnRegistered'], 'Registered', ['class' => 'form-control', 'required' => '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-10 col-xs-2 form-group">
                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>List of Bank Reconciliation</h4>
        </div>
        
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($recons) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Name</th>
                        <th>Amount</th>
                        <th>ReferenceNumber</th>
                        <th>PaymentType</th>
                        <th>Payment Status</th>
                        <th>Registration Type</th>
                        <th>Date</th>


                    </tr>
                </thead>
                <tbody>
                    @if (count($recons) > 0)
                        @foreach ($recons as $recon)
                            <tr data-entry-id="{{ $recon->id }}">
                                <td></td>
                                <td>{{ $recon->Name }}</td>
                                <td>{{ $recon->Amount }}</td>
                                <td>{{ $recon->ReferenceNumber }}</td>
                                <td>{{ $recon->PaymentType }}</td>
                                <td>
                                @if($recon->PaymentStatus == "Pending") 
                                   <button  class="btn btn-info pending" id="{{ $recon->id }}" >Pending</button> 
                               
                                @else 
                                        {{ $recon->PaymentStatus }}
                                @endif
                                    
                                </td>
                                <td>{{ $recon->RegistrationType }}</td>
                                <td>{{ $recon->created_at }}</td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>


@stop

@section('javascript') 
  <script>
    var env = window.location.host;
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }

    $('.pending').on('click', function(){      
      $.ajax({
            data: {  
                    id: $(this).attr('id'),              
                                    
                     _token: '{!! csrf_token() !!}'
                    
                },
            url: baseurl + '/admin/updateReconcillation',
            method: 'PUT',
            dataType: 'json',
            success:function(data) {
                console.log(data);
                location.reload(); 
            }
           });    
    });

    
  </script>
@endsection



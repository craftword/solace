@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
@if ($message = Session::get('unsuccessfully'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
@endif
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Waiting Patients</li>
  </ol>
</nav>
    <h3 class="page-title">Patients In Waiting</h3>

    <p>
       
        <a href="{{ url('admin/logAuthCode') }}" class="btn btn-primary"> Authorization Code Logs</a>
       
        
    </p>
     <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>Surname</th>
                        <th>Firstname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Registration type</th>
                        <th>&nbsp;</th> 
                        <th>&nbsp;</th>                        

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($patients) > 0)
                        @foreach ($patients as $patient)
                            <tr >
                                <td>{{ $patient->Surname }}</td>
                                <td>{{ $patient->Firstname }}</td>
                                <td>{{ $patient->Email }}</td>
                                <td>{{ $patient->PhoneNumber }}</td>
                                @if($patient->RegistrationType == "HMO")
                                <td style="color:blue;">{{ $patient->RegistrationType }}</td>
                                <td>
                                    @if( $patient->lastestBill->AuthCode == NULL)
                                        <button type="button" class="btn btn-primary user_dialog" data-toggle="modal" data-target="#exampleModal" data-id="{{ $patient->id }}" name="{{ $patient->lastestBill->id }}">
                                        Add Authorization Code
                                        </button> 
                                    @else
                                        {{$patient->lastestBill->AuthCode}}
                                    @endif
                                </td>
                                @elseif($patient->RegistrationType == "ANC")
                                 <td style="color:red;">{{ $patient->RegistrationType }}</td> 
                                 <td> No Authorization Required </td>  
                                @else
                                <td style="color:green;">{{ $patient->RegistrationType }}</td>
                              
                                <td> No Authorization Required </td>  
                                
                                @endif
                               
                                
                                
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


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Authorize Code</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/authcode']) !!}
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            {!! Form::label('AuthCode', 'AuthCode *', ['class' => 'control-label']) !!}
                            {!! Form::text('AuthCode', old('AuthCode'), ['class' => 'form-control']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('AuthCode'))
                                <p class="help-block">
                                    {{ $errors->first('AuthCode') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-xs-6 form-group">
                            {!! Form::label('AuthDuration', 'AuthDuration *', ['class' => 'control-label']) !!}
                            {!! Form::text('AuthDuration', old('AuthDuration'), ['class' => 'form-control']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('AuthDuration'))
                                <p class="help-block">
                                    {{ $errors->first('AuthDuration') }}
                                </p>
                            @endif
                        </div>

                        </div>
                        <div class="row">                        
                        <div class="col-xs-6 form-group">
                            {!! Form::label('AuthorizerName', '	Authorizer Name *', ['class' => 'control-label']) !!}
                            {!! Form::text('AuthorizerName', old('AuthorizerName'), ['class' => 'form-control']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('AuthorizerName'))
                                <p class="help-block">
                                    {{ $errors->first('AuthorizerName') }}
                                </p>
                            @endif
                        </div>

                        </div>
				        <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('Report', 'Report *', ['class' => 'control-label']) !!}
                            {!! Form::textarea('Report', old('Report'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('Report'))
                                <p class="help-block">
                                    {{ $errors->first('Report') }}
                                </p>
                            @endif
                        </div>

                        </div>			                
				                <div class="row">
					                <div class="col-md-offset-10 col-xs-2 form-group">
					                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
					                </div>
					            </div>
                                <input type="hidden" name="biodata_id" id="biodataId" value=""/>
                                <input type="hidden" name="clinicHistory_id" id="clinicId" value=""/>
				                {!! Form::close() !!}

				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>

@stop


@section('javascript') 
  <script>  

    $(document).on("click", ".user_dialog", function () {
     var biodataId = $(this).data('id');
     var clinicId = $(this).attr('name');
    //  alert(biodataId +" -- " + clinicId);
     $(".modal-body #biodataId").val(biodataId);
     $(".modal-body #clinicId").val(clinicId);
});
  </script>
@endsection



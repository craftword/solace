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
    <li class="breadcrumb-item active" aria-current="page">Patients</li>
  </ol>
</nav>
    <h3 class="page-title">Patients Biodata</h3>    
    <p>
<<<<<<< HEAD
        <a href="{{ route('admin.patients.create') }}" class="btn btn-success">@lang('global.app_add_new')</a> | 
        <a href="{{ URL::to('admin/getfamilies') }}" class="btn btn-primary">Family Card</a>
=======
        <a href="{{ route('admin.patients.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    </p>
   
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($patients) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Surname</th>
                        <th>Firstname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Registration Type</th>
                        <th>Status</th>                        
                        <th>&nbsp;</th>
                        

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($patients) > 0)
                        @foreach ($patients as $patient)
                            <tr data-entry-id="{{ $patient->id }}">
                                <td></td>
                                <td>{{ $patient->Surname }}</td>
                                <td>{{ $patient->Firstname }}</td>
                                <td>{{ $patient->Email }}</td>
                                <td>{{ $patient->PhoneNumber }}</td>
                                <td>
                                @if($patient->RegistrationType === 'HMO' )
                                    <a href="{{ URL::to('admin/addhmo/'.$patient->id ) }}">HMO</a>
<<<<<<< HEAD
                                @elseif($patient->RegistrationType === 'UNREGISTER PATIENT')
                                    <a href="{{ URL::to('admin/addOutsidePatientHistory/'.$patient->id ) }}">UNREGISTER PATIENT</a>
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                @else 
                                    {{$patient->RegistrationType }}
                                @endif
                                </td>
                                <td>
<<<<<<< HEAD
                                 @if($patient->RegistrationType != 'UNREGISTER PATIENT')
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                    <label class="switch">
                                          <input type="checkbox" name="" id='status' @if ($patient->Status == 'unchecked') value="checked" @else value="unchecked" checked='checked'  @endif>
                                          <span class="slider round"></span>
                                          <input type="hidden" value="{{ $patient->id }}" class="idTask" />
<<<<<<< HEAD
                                          <input type="hidden" value="{{ $patient->RegistrationType }}" class="reg" />
                                    </label>
                                  @else 
                                  <a href="{{ URL::to('admin/unregisteredPatient/'.$patient->id ) }}">Documents</a>
                                  @endif    
                               </td>
                               <td>
                               <a href="{{ route('admin.patients.show',[$patient->id]) }}" class="btn btn-xs btn-danger">@lang('global.app_view')</a>
=======
                                    </label>
                                    
                               </td>
                               <td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                               <a href="{{ route('admin.patients.edit',[$patient->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    
                              </td>
                                
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
<<<<<<< HEAD
    <!-- Family Card Modal -->
<div class="modal fade" id="family" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Family Card</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{!! Form::open(['method' => 'POST', 'url' => 'admin/addFamilyCards']) !!}
		                    	<div class="row">
		                			<div class="col-xs-12 form-group">
						                     {!! Form::label('familyname', 'Family name*', ['class' => 'control-label']) !!}
						                     {!! Form::text('familyname', old('familyname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
						                    <p class="help-block"></p>
						                    @if($errors->has('familyname'))
						                        <p class="help-block">
						                            {{ $errors->first('familyname') }}
						                        </p>
						                    @endif
						                </div>
                                    <div class="col-xs-6 form-group">
                                        {!! Form::label('familytype', ' Family type', ['class' => 'control-label']) !!}
                                        {!! Form::select('familytype', ['Super' => 'Super', 'Ordinary' => 'Ordinary'], null, ['class' => 'form-control','placeholder' => 'Pick a Type...']); !!}
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
					  </div>
					</div>

=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
@stop

@section('javascript') 
    <script>
        
        $(':checkbox').on('change', function(e) {

        e.preventDefault(); 
         var env = window.location.host;
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }     
        var $this = $(this);
        console.log($(this).parents('.switch').children('#status').val());
        console.log($(this).parents('.switch').children('.idTask').val());

        $.ajax({
            data: {  
                    idTask: $(this).parents('.switch').children('.idTask').val(),                  
                    checkboxStatus: $this.val(),
<<<<<<< HEAD
                    reg:$(this).parents('.switch').children('.reg').val(),
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    _token: '{!! csrf_token() !!}'
                    
                },
            url: baseurl + '/admin/changestatustask',
            method: 'PUT',
            dataType: 'json',
            success:function(data) {
<<<<<<< HEAD
                alert(data.msg);                
=======
                alert(data.msg);
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                location.reload();
            } 
            
        }); 

    });

    </script>
@endsection
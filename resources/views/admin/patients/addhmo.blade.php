@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.patients.index') }}">Patients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Patient to HMO</li>
  </ol>
</nav>
    <h3 class="page-title">Patient TO HMO</h3>
    
<<<<<<< HEAD
   
=======
    {!! Form::open(['method' => 'POST', 'url' => 'admin/addhmopatient']) !!}
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

    <div class="panel panel-default">
        

        <div class="panel-body">
         @if (count($hmomember) > 0)
            <h2> Is a member of {{$hmomember->Hmo}} with plan {{$hmomember->Plan}} </h2>

<<<<<<< HEAD
            <hr />
           <div class="row"> 
            {!! Form::model($hmomember, ['method' => 'PUT', 'url' => 'admin/addhmo/'.$hmomember->id]) !!}    
            
                <div class="col-xs-6 form-group">
                 
                    {!! Form::label('HMO', 'HMOs *', ['class' => 'control-label']) !!}
                    {!! Form::text('Hmo', old('Hmo'), ['class' => 'form-control']); !!}
                        <p class="help-block"></p>
                            @if($errors->has('Hmo'))
                                <p class="help-block">
                                    {{ $errors->first('Hmo') }}
                                </p>
                             @endif
                    
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Plan', 'Plan*', ['class' => 'control-label']) !!}
                    {!! Form::text('Plan', old('Plan'), ['class' => 'form-control']); !!}
                   
                </div>
            </div>
                        <div class="row">
                <div class="col-md-offset-10 col-xs-2 form-group">
                    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::hidden('biodata_id', $patient->id) !!}
         {!! Form::close() !!} 
                  
        </div>
          @else
            <div class="row">        
            {!! Form::open(['method' => 'POST', 'url' => 'admin/addhmopatient']) !!}
                <div class="col-xs-6 form-group">
                 
=======
          @else
            <div class="row">        
      
                <div class="col-xs-6 form-group">
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    {!! Form::label('HMO', 'HMOs *', ['class' => 'control-label']) !!}
                    {!! Form::select('Hmo', $hmonames, old('Hmo'), ['class' => 'form-control hmo','placeholder' => 'Pick a HMO Name...']); !!}
                        <p class="help-block"></p>
                            @if($errors->has('Hmo'))
                                <p class="help-block">
                                    {{ $errors->first('Hmo') }}
                                </p>
                             @endif
                    
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('Plan', 'Plan*', ['class' => 'control-label']) !!}
                   <select name="Plan" class="form-control plan"> 
                        
                   </select>
                </div>
            </div>
<<<<<<< HEAD
            <div class="row">
=======
                        <div class="row">
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                <div class="col-md-offset-10 col-xs-2 form-group">
                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::hidden('biodata_id', $patient->id) !!}
         {!! Form::close() !!} 
         @endif  
        </div>
    </div>
@stop

@section('javascript') 
<script>
 $('select').on('change', function(e) {
    // Additional JavaScript
    e.preventDefault();	
    console.log($(this).val());
	 var env = window.location.host;
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }	

    $.ajax({
        data: {
            id:$(this).val(),
            _token: '{!! csrf_token() !!}'
        },
		url: baseurl + '/admin/getPlan',
		method: 'GET',
		dataType: 'json',
		success:function(data) {
            $('.plan').empty();            
            var html = "";
           for (var i=0; i < data.length; i++) {
		        html += "<option>"+data[i].Plan+"</option>";
		    }

            $('.plan').append(html);
           // console.log(data[1].Plan);
		}
			        
	});				    	 
});



</script>

@endsection
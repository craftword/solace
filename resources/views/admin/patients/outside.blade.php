@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.patients.index') }}">Patients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Outside Patient</li>
  </ol>
</nav>
<h3 class="page-title">Outside Patient Histories</h3>
	 @if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
			</div>
    @endif
<div class="row">
    <div class="col-md-12">            	
    <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Outside Patients </a></li>
            </ul>
            <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">                  	
					<div class="row">
                   		<div class="col-xs-2 form-group">
					            <a href="#" class="btn btn-success labs">Add New Row</a>
					     </div>
					</div>
                    	
                    	<div class="row">
                			<div class="col-md-offset-1 col-xs-10">
		                    	<div class="row table-responsive">
		                    		<table class="table table-bordered" id='lab'>
		                    			
		                    			<thead>
		                    				<tr>
			                    				<th>INVESTIGATION</th>
						                        <th>RESULT</th>
						                        <th>REFERENCE</th>
						                        <th>COST</th>
						                    </tr>
					                    </thead>
					                    <tbody class="lab">
					                    	
					                    </tbody>


		                    	   	</table>
		                    	</div>
		                    </div>
		                </div>
		    <div class="row">
                                        
                 <div class="row table-responsive">
                      <div class="col-md-offset-1 col-xs-10">          
                              <table class="table table-bordered">
                              {!! Form::open(['method' => 'POST', 'route' => ['admin.billings.store']]) !!}
                                <tr>
                                    <td><strong>Total Cost</strong></td><td><input type='text' class='form-control totalcost' name='LabCost' /></td>
                                    <input type='hidden' class='form-control overallcost' name='OverallCost' />
                                    <input type='hidden' class='form-control payment' name='Payment' />
                                </tr>
                                    
                             </table>                    
                                        
                         </div>          
                                
                    </div>
                <div class="row">
                        <div class="col-md-offset-10 col-xs-2 form-group">
                            {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                            {!! Form::hidden('biodata_id', $patient->id) !!}
                            {!! Form::hidden('clinicHistory_id', 0) !!}
                            {!! Form::close() !!}   

                        
                        
                   
            </div>                							
               


                  </div>
            </div>
        </div>

    </div>
</div>


@stop
@section('javascript') 
<script>
    var j = 0;
       $('.labs').on('click', function(){
		   
       		 var env = window.location.host;
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }
       		 $.ajax({
				data: {
					regType: $("#hmo").val(),
					id: $("#id").val(),
					_token: '{!! csrf_token() !!}'
				},
		    	url:baseurl + '/admin/labs',
		        method: 'GET',
		        dataType: 'json',
		        success:function(data) {
		        	//console.log(data);
		        	var html = "<tr class='trow"+j+"'><td><select class='form-control' name='rows["+ j +"][LabTestName]'><option value='1'>Pick a Test</option>";
		        	    for (var i=0; i < data.length; i++) {
		        	    	html += "<option value='"+i+"'>"+data[i].LabTestName+"</option>";
		        		}
		        	    html += "</select></td> <td><input type='text' class='form-control' name='rows["+ j +"][Result]' /></td> <td class='ref'><input type='text' class='form-control' name='rows["+ j +"][Reference]'/></td><td class='cost'><input type='text' class='form-control' name='rows["+ j +"][LabCost]'/></td></tr>"
		        	    $('tbody.lab').append(html);
		        	    console.log(j);
		        	

				        $('select').on('change', function(e) {
				              // Additional JavaScript
				              	e.preventDefault();					       	
						        var ref = "<input type='text' class='form-control' name='rows["+ j +"][Reference]' value='"+data[$(this).val()].Reference+"'/>";
						        var cost = "<input type='text' class='form-control LabCost' name='LabCost' value='"+data[$(this).val()].LabCost+"'/>";
						        $('.trow'+j+' option').val(data[$(this).val()].LabTestName);
						        $('.trow'+j+' td.ref').html(ref);
						    	$('.trow'+j+' td.cost').html(cost);
						    	 
					    });
		        					    	
					    
				}
			        
	    	});
			j++;

       });

       //calculate total of Procedure 
     $('.totalcost').on('focus', function(){
         var total = 0;
         $('.LabCost').each(function(){
             if ($(this).prop('disabled') == false) {
                 total += Number($(this).val());
             }
             else {
                 total += 0;
             }
           
        });
        $('.totalcost').val(total);
        $('.overallcost').val(total);
        $('.payment').val(total);


    });


 </script>
 @endsection
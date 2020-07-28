@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Inventory Movement</li>
  </ol>
</nav>
    <h3 class="page-title">Inventory Movement </h3>
    @if(Auth::user()->roles[0]->name == 'Pharmacy')
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Add New Drug
    </button>
    @endif
    <p> </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            Inventory Movement List 
        </div>

        <div class="panel-body table-responsive">
            <table id='example' class="table table-bordered table-striped {{ count($outstores) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Drug Name</th>
                        <th>Brand Name</th>
                        <th>Department</th>
                        <th>Quantity</th>
                        <th>Add or remove</th>
                        <th>Last Updated Time </th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($outstores) > 0)                       
                        @foreach ($outstores as $outstore)                                              
                            <tr data-entry-id="{{ $outstore->id }}">
                                <td>                                  
                                   
                                </td>
                                <td>{{ $outstore->DrugName }}</td>
                                <td>{{ $outstore->BrandName}}</td>
                                <td>{{ $outstore->department }}</td>
                                <td>{{ $outstore->quantity }}</td>
                                <td>                                                                    
                                   @if(Auth::user()->roles[0]->name == 'Pharmacy')
                                   <a href="#" class="plus" id="{{ $outstore->id }}" name="{{ $outstore->quantity }}"><i class="fa fa-plus" aria-hidden="true" ></i></a> 
                                   @endif 
                                   |  <a href="#"class="minus" id="{{ $outstore->id }}" name="{{ $outstore->quantity }}"> <i class="fa fa-minus" aria-hidden="true"></i></a> 
                                </td>
                                <td>{{ date('jS F, Y',strtotime($outstore->updated_at))}} </td>                             

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
 <!-- Drug Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Prescription</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	<h3 class="page-title">Add New Prescription </h3>
                  		{!! Form::open(['method' => 'POST', 'url' => 'admin/storeMovement']) !!}

                  			<div class="row">
				                <div class="col-xs-6 form-group">
				                    {!! Form::label('DrugName', 'Drug Name *', ['class' => 'control-label']) !!}
				                   	<select class="itemName form-control" name="DrugName">
									   </select>
				                    <p class="help-block"></p>
				                    @if($errors->has('DrugName'))
				                        <p class="help-block">
				                            {{ $errors->first('DrugName') }}
				                        </p>
				                    @endif
				                </div>
                                 <div class="col-xs-6 form-group">
				                    {!! Form::label('department	', 'Department	*', ['class' => 'control-label']) !!}
				                    {!! Form::select('department', ['Pharmacy' => 'Pharmacy', 'A/E' => 'A/E', 'Labour' => 'Labour', 'Laboratory' => 'Laboratory', 'Theatre' => 'Theatre', 'Laundry' => 'Laundry'], null, ['class' => 'form-control','placeholder' => 'Pick a Department...']); !!}
				                    <p class="help-block"></p>
				                    @if($errors->has('department'))
				                        <p class="help-block">
				                            {{ $errors->first('department') }}
				                        </p>
				                    @endif
				                </div>
				            </div>
                            <div class="row">
				                <div class="col-xs-6 form-group pharmId">
				                    
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
@stop

@section('javascript') 
  <script>
    $(document).ready(function() {
 		var env = window.location.host;
         if (env === "localhost"){
             var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
         } else {
             var baseurl = window.location.protocol + "//" + window.location.host + "/";
         }

          $('.itemName').select2({
	 	
        placeholder: 'Select a Drug',
		dropdownParent: $("#exampleModal"),
		dropdownAutoWidth : true,
   		width: '100%',
        ajax: {
		  data: function (params) {
				return {
					q: params.term, // search term
					id: $("#id").val(),
					regType: $("#hmo").val(), 
					}
				},
		  url: baseurl + '/admin/getDrugs',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
			  console.log(data);  
			$('.itemName').on('change', function(e) {
				e.preventDefault();	
				$.each(data, function (i, d){
					if(data[i].id == $('.itemName').val()) {
					console.log(d.UnitCost);
					$('.cost').empty();
					var txt = "<input type='hidden' name=pharmId class='form-control' value='"+d.id+"' />";
					$(".itemName option:selected").val(d.DrugName);
					$('.pharmId').append(txt);
					}
				});
				console.log($('.itemName').val());			   
			    
			 });	  
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.DrugName,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });

      // plus 
      $('.plus').on('click', function(e){
          e.preventDefault();	
            const qty = Number(prompt("Enter quantity to be added"));
            const initialQxy = Number($(this).attr('name'));
            const updateQxy = Number(initialQxy + qty);
           $.ajax({
            data: {  
                    id: $(this).attr('id'),
                    quantity:qty,
                    type:"added",                  
                    updatedQty: updateQxy,
                     _token: '{!! csrf_token() !!}'
                    
                },
            url: baseurl + '/admin/updateMovement', 
            method: 'PUT',
            dataType: 'json',
            success:function(data) {
                console.log(data);
                location.reload();
                 
            }      
           });
           
      });

       // minus 
      $('.minus').on('click', function(e){
          e.preventDefault();	
          if($(this).attr('name') == 0) {
              alert('There is no quantity');
          }
          else {
           const qty = Number(prompt("Enter quantity to be removed"));
            const initialQxy =Number($(this).attr('name'));
            const updateQxy = Number(initialQxy - qty);
           $.ajax({
            data: {  
                    id: $(this).attr('id'),                  
                    quantity:qty,
                    type:"removed",                  
                    updatedQty: updateQxy,
                     _token: '{!! csrf_token() !!}'
                    
                },
            url: baseurl + '/admin/updateMovement',
            method: 'PUT',
            dataType: 'json',
            success:function(data) {
                console.log(data);
                location.reload(); 
            }
           });    
          }
          
      });
    });

    $('#example').dataTable({
        "paging":false
    });
  </script> 
@endsection

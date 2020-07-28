@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
     <li class="breadcrumb-item active" aria-current="page">Family Account </li>
  </ol>
</nav>
    <h3 class="page-title"> Family Account </h3>
     @if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
			</div>
	@endif
    
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($families) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Family name</th>
                        <th>Type</th>
                        <th>Date</th> 
                        <th>Add Deposit </th>
                        <th>Check Deposit Balance</th>                     


                    </tr>
                </thead>
                
                <tbody>
                    @if (count($families) > 0)
                        @foreach($families as $family)
                         <tr data-entry-id="{{ $family->id }}">
                                <td> </td>
                                <td>{{$family->familyname}}  </td> 
                                <td>{{ $family->familytype}} </td>
                               <td>{{$family->created_at}} </td>                             
                               <td>
                                    <a href="#" id="{{ $family->id }}" class="family">Add Deposit </a>
                               </td>
                               <td>
                                    <a href="#" id="{{ $family->id }}" class="deposit">Check Deposit </a>
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
@stop



@section('javascript') 
  <script>
  var env = window.location.host;
		if (env === "localhost") {
		  var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
		}else {
		    var baseurl = window.location.protocol + "//" + window.location.host + "/";
		}
  $('.family').on('click', function(e){
     console.log($(this).attr('id'));
      e.preventDefault();	
      const deposit = Number(prompt("Enter deposit"));
      console.log(deposit);
      

      $.ajax({
            data: {  
                    id: $(this).attr('id'),                  
                    pay: deposit,
                    _token: '{!! csrf_token() !!}'
                    
                },
            url: baseurl + '/admin/familydeposit',
            method: 'POST',
            dataType: 'json',
            success:function(data) {
                alert(data.msg);
                //location.reload();
                
            } 
            
        });
 });

$('.deposit').on('click', function(e){
      e.preventDefault();	
      $.ajax({
            data: {  
                    id: $(this).attr('id'),                  
                    _token: '{!! csrf_token() !!}'
                    
                },
            url: baseurl + '/admin/familyAccountAmount',
            method: 'GET',
            dataType: 'json',
            success:function(data) {
                alert(data.msg);
                location.reload();
                
            } 
            
        }); 

  });

 </script>

@endsection




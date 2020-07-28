@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
     <li class="breadcrumb-item"><a href="{{ route('admin.billings.index') }}">Billings</a></li>
     <li class="breadcrumb-item active" aria-current="page">Oustanding Bills</li>
  </ol>
</nav>
    <h3 class="page-title"> Bills</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($outstandings) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Surname</th>
                        <th>Firstname</th>
                        <th>Total Bill</th>
                        <th>Payment </th>
                        <th>Balance</th>
                        <th>Date</th> 
                        <th>Registration Type</th> 
                        <th> </th>                      


                    </tr>
                </thead>
                
                <tbody>
                    @if (count($outstandings) > 0)
                        @foreach($outstandings as $outstanding)
                         <tr data-entry-id="{{ $outstanding->id }}">
                                <td> </td>
                                <td>{{$outstanding->Surname}}  </td> 
                                <td>{{ $outstanding->Firstname}} </td>
                                <td>{{ $outstanding->Bill}} </td>
                                <td>{{$outstanding->Payment  }} </td>
                                <td>{{$outstanding->Balance  }} </td> 
                                <td>{{date('jS F, Y',strtotime($outstanding->created_at))}} </td>
                                <td>
                                    @if($outstanding->clinicHistory_id == 0)
                                        Unregistered Patient
                                    @else 
                                        Registered Patient
                                    @endif
                                </td>

                                <td> 
                                    <a href="#" id="{{$outstanding->id}}" class="outstand">Make Payment</a>
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
  $('.outstand').on('click', function(e){
     console.log($(this).attr('id'));
      e.preventDefault();	
      const payment = Number(prompt("Enter payment"));
      var env = window.location.host;
		if (env === "localhost") {
		  var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
		}else {
		    var baseurl = window.location.protocol + "//" + window.location.host + "/";
		}

      $.ajax({
            data: {  
                    id: $(this).attr('id'),                  
                    pay: payment,
                    value: $(this).val(),
                    _token: '{!! csrf_token() !!}'
                    
                },
            url: baseurl + '/admin/makeOutstandingPayment',
            method: 'PATCH',
            dataType: 'json',
            success:function(data) {
                location.reload();
                
            } 
            
        }); 
  });

 </script>

@endsection




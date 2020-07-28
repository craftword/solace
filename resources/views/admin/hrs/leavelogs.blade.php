@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/humanresource') }}">Staff List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Leave Logs</li>
  </ol>
</nav>
    <h3 class="page-title">Leave Logs</h3>    
     <div class="panel panel-default">
        <div class="panel-heading">
            List 
        </div>

        <div class="panel-body table-responsive">
            <table id="result" class="table table-bordered table-striped {{ count($leaves) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Surname</th>
                        <th>Firstame</th>
                        <th>Start Date</th>
                        <th>Expected Return Date</th>
                        <th>Actual Return Date</th>
                        <th>Leave Details</th>
                        <th> Reason</th>                       
                        <th>Paid </th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($leaves) > 0)
                        @foreach ($leaves as $leave)
                            <tr data-entry-id="{{ $leave->id }}">
                                <td>

                                </td>
                                <td>{{ $leave->SURNAME }}</td>
                                <td>{{ $leave->FIRSTNAME }}</td>
                                <td>{{ $leave->startDate  }}</td>
                                <td>{{ $leave->expectedReturnDate }}</td>  
                                <td>                             
                                     <a href="#" id="{{ $leave->id }}">{{ $leave->actualReturnDate }} </a>                               
                               
                                
                                </td>                                   
                                <td>{{ $leave->leaveDetails }}</td> 
                                <td>{{ $leave->reason }}</td>  
                                <td>{{ $leave->paidLeave }}</td>  
                               

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
$(document).on("click", 'a', function(event){
        event.preventDefault();
        let dd = prompt("Enter the Date");
        let id = $(this).attr("id");
        var env = window.location.host;
		if (env === "localhost") {
		  var baseurl = window.location.protocol + "//" + window.location.host + "/" + "solace/public";
		}else {
		    var baseurl = window.location.protocol + "//" + window.location.host + "/";
		}

      

        $.ajax({

            url: baseurl + '/admin/changeLeave',
            type:'POST',
            data:{  
                    id: $(this).attr('id'),                  
                    changeDate: dd,                    
                    _token: '{!! csrf_token() !!}'
                    
                },
            dataType: 'json',
            success:function(data) {
                location.reload();

            },
            error: function(){
            alert('something went wrong');
        }
});


});

</script>

@endsection








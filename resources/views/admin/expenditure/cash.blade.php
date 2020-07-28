@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cash Book</li>
  </ol>
</nav>
    <h3 class="page-title">Cash Book</h3>

    <p> 
     @can('manage_accounts')
        <a href="{{ url('admin/cashbooklog') }}" class="btn btn-info"> Cashbook Logs</a>
        @endcan 
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>List Of Transactions</h4>
        </div>
        
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($cashbooks) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Patient Name</th>
                        <th>Amount Paid</th>                        
                        <th>Date</th>
                        <th>Amount Received</th>


                    </tr>
                </thead>
                <tbody>
                  
                    @if (count($cashbooks) > 0)
                        @foreach ($cashbooks as $cashbook)
                            @can('manage_cashbook')
                            <tr data-entry-id="{{ $cashbook->id }}">
                                <td></td>
                                <td>{{ $cashbook->Firstname }} {{ $cashbook->Surname }}</td>
                                <td>{{ $cashbook->Payment }}</td>                                
                                <td>{{ $cashbook->created_at }}</td>
                                <td>
                                    @if( $cashbook->AmountReceived == 0)
                                        <button class="btn btn-primary amt" id="{{ $cashbook->id }}"> Add Amount Received </button>
                                    @else 
                                        {{$cashbook->AmountReceived }}
                                    @endif
                                </td>

                            </tr>
                            @endCan
                            @can('manage_accounts')
                               
                                <tr data-entry-id="{{ $cashbook->id }}">
                                    <td></td>
                                    <td>{{ $cashbook->Firstname }} {{ $cashbook->Surname }}</td>
                                    <td>{{ $cashbook->Payment }}</td>                                
                                    <td>{{ $cashbook->created_at }}</td>
                                    <td>
                                        @if( $cashbook->AmountReceived == 0)
                                            Not Updated Yet
                                        @else 
                                            {{$cashbook->AmountReceived }}
                                        @endif
                                    
                                    </td>

                                </tr>                             
                                
                            @endCan
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

    $('.amt').on('click', function(e){

        const qty = Number(prompt("Enter Amount Received"));
      
      $.ajax({
            data: {  
                    id: $(this).attr('id'),                  
                    quantity:qty,                   
                     _token: '{!! csrf_token() !!}'
                    
                },
            url: baseurl + '/admin/updateAmountReceived',
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


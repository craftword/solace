@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
     <li class="breadcrumb-item"><a href="{{ route('admin.billings.index') }}">Billings</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Bills</li>
  </ol>
</nav>
    <h3 class="page-title">Last Bills </h3>
    

    <div class="panel panel-default">
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-offset-1 col-xs-8">
                    <h3>Past Billings </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-xs-10">
                    <div class="row table-responsive">
                            <table class="table table-bordered">
                               @if (count($bills) > 0)
                                    @foreach ($bills as $bill)
                                        <tr>
                                            <td>{{ $bill->id }}</td><td><a href="{{ URL::to('admin/billings/view/'.$bill->clinicHistory_id) }}">View </a></td><td>{{ $bill->created_at}}</td>
                                        </tr>
                                     @endforeach
                                @else
                                    <tr>
                                        <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                                    </tr>
                                @endif  
                                
                            </table>
                    </div>          
                  
                </div>
            </div>
        </div>
        
    </div>

@stop


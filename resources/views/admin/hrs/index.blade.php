@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Staff List</li>
  </ol>
</nav>
    <h3 class="page-title">Staff List</h3>    
    <p>
        <a href="{{ route('admin.humanresource.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        <a href="{{ url('admin/payroll') }}" class="btn btn-primary">Payroll</a>
        <a href="{{ url('admin/leaveslogs') }}" class="btn btn-warning">Leave Logs</a> 
        <a href="{{ url('admin/terminatelogs') }}" class="btn btn-danger">Terminate Logs</a> 
        <a href="{{ url('admin/pensionlogs') }}" class="btn btn-default">Pension Logs</a> 
    </p>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($hrs) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Title</th>
                        <th>Surname</th>
                        <th>Firstame</th>
                        <th>Sex</th>
                        <th>Email</th>
                        <th>Phone Number </th>                                            
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($hrs) > 0)
                        @foreach ($hrs as $hr)
                            <tr data-entry-id="{{ $hr->id }}">
                                <td>

                                </td>
                                <td>{{ $hr->TITLE }}</td>
                                <td>{{ $hr->SURNAME }}</td>
                                <td>{{ $hr->FIRSTNAME }}</td>
                                <td>{{ $hr->SEX  }}</td>
                                <td>{{ $hr->EMAIL }}</td>
                                <td>{{ $hr->PHONENUMMBERS }}</td>
                                                              
                                <td>
                                    <a href="{{ route('admin.humanresource.show',[$hr->id]) }}" class="btn btn-xs btn-success">View </a>
                                    
                                    <a href="{{ route('admin.humanresource.edit',[$hr->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.humanresource.destroy', $hr->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    
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
<!-- Diagnosis Modal -->
<div class="modal fade" id="leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">New Diagnosis</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	{{$hr->id}}
				            </div>
					      </div>
					      
					    </div>
					  </div>
					</div>
@stop



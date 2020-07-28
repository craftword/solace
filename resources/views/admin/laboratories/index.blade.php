@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Laboratory</li>
  </ol>
</nav>
    <h3 class="page-title">Laboratory Tests</h3>     
    <p>
        <a href="{{ route('admin.laboratories.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($Labs) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Lab Test Name</th>
                        <th>Reference</th>
                        <th>LabCost</th>                        
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($Labs) > 0)
                        @foreach ($Labs as $Lab)
                            <tr data-entry-id="{{ $Lab->id }}">
                                <td></td>
                                <td>{{ $Lab->LabTestName }}</td>
                                <td>{{ $Lab->Reference }}</td>
                                <td>{{ $Lab->LabCost }}</td>
                                
                                <td>
                                   <a href="{{ route('admin.laboratories.edit',[$Lab->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.laboratories.destroy', $Lab->id])) !!}
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

@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.patients.mass_destroy') }}';
    </script>
@endsection

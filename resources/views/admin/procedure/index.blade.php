@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Procedures</li>
  </ol>
</nav>
    <h3 class="page-title">Procedure Inventory</h3>
    <p>
        <a href="{{ route('admin.procedure.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>
   
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($procedures) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Name</th>
                        <th>Cost</th>
<<<<<<< HEAD
                         @can('users_manage')
                        <th>&nbsp;</th>
                        @endcan
=======
                        <th>&nbsp;</th>

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($procedures) > 0)
                        @foreach ($procedures as $procedure)
                            <tr data-entry-id="{{ $procedure->id }}">
                                <td></td>
                                <td>{{ $procedure->Name }}</td>
                                <td>{{ $procedure->Cost }}</td>
<<<<<<< HEAD
                                 @can('users_manage')
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                <td>
                                                                       
                                    <a href="{{ route('admin.procedure.edit',[$procedure->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.procedure.destroy', $procedure->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                     
                                </td>
<<<<<<< HEAD
                                 @endcan
=======

>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
        window.route_mass_crud_entries_destroy = '{{ route('admin.procedure.mass_destroy') }}';
    </script>
@endsection

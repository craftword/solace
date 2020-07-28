@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pharmacy</li>
  </ol>
</nav>
    <h3 class="page-title">Pharmacy Inventory</h3>
     @can('edit_pharmacy')
    <p>
        <a href="{{ route('admin.pharmacy.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
<<<<<<< HEAD
        <a href="{{ url('/admin/expireDrug') }}" class="btn btn-primary">Expired Drugs</a>
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    </p>
    @endcan
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($drugs) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Drug Name</th>
                        <th>Brand Name</th>
                        <th>Drug Type</th>
                        <th>Unit Quantity</th>
<<<<<<< HEAD
                        <th>Min Stock</th>
                        <th>Price </th>
                        
=======
                        <th>Price </th>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($drugs) > 0)
                        @foreach ($drugs as $drug)
                            <tr data-entry-id="{{ $drug->id }}">
<<<<<<< HEAD
                                <td style="color:red;">
                                    @if($drug->expire < 1 )
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true" ></i> 
                                                                              
                                    @endif 
                                                                        
                                </td>
=======
                                <td></td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                <td>{{ $drug->DrugName }}</td>
                                <td>{{ $drug->BrandName }}</td>
                                <td>{{ $drug->DrugType  }}</td>
                                <td>{{ $drug->UnitQuantity }}</td>
<<<<<<< HEAD
                                <td>{{ $drug->minStock }}</td>
                                <td>{{ $drug->UnitCost }}</td>
                                
=======
                                <td>{{ $drug->UnitCost }}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                <td>
                                    <a href="{{ route('admin.pharmacy.show',[$drug->id]) }}" class="btn btn-xs btn-success">View </a>
                                    @can('edit_pharmacy')
                                    <a href="{{ route('admin.pharmacy.edit',[$drug->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.pharmacy.destroy', $drug->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                     @endcan
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
@can('edit_pharmacy')
@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.patients.mass_destroy') }}';
    </script>
@endsection
@endcan
@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/store') }}">Store</a></li>
    <li class="breadcrumb-item active" aria-current="page">Low Stock</li>
  </ol>
</nav>
    <h3 class="page-title">Store</h3>
    <div class="row">
                <div class="col-md-offset-8 col-md-4">	                  
                    <a href="#" class="btn btn-primary print-preview" >
                        Print 
                    </a>
                </div>      	
            </div>	    
    <div class="panel panel-default">          
        <div class="panel-heading">
            Items List
        </div>

        <div class="panel-body table-responsive printablearea">
            <table class="table table-bordered table-striped {{ count($stores) > 0 ? 'datatable' : '' }} dt-select ">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>Drug Name</th>
                        <th>Brand Name</th>
                        <th>Drug Type</th>
                        
                        
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($stores) > 0)
                        @foreach ($stores as $store)
                             @if($store->quantity < $store->minStock)                         
                                <tr data-entry-id="{{ $store->id }}">
                                    <td><input type="checkbox"/> </td>
                                    <td>{{ $store->DrugName }}</td>
                                    <td>{{ $store->BrandName }}</td>
                                    <td>{{ $store->DrugType }}</td>                                                                  

                                </tr>
                            @endif
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
$(document).ready(function(){ 
   $('a.print-preview').on('click', function(e){
       e.preventDefault();
       e.stopPropagation();
       $('.printablearea').printThis({
            debug: false, // show the iframe for debugging
            importCSS: true, // import page CSS
            importStyle: true, // import style tags
            printContainer: true, // grab outer container as well as the contents of the selector
            loadCSS: "{{ url('adminlte/bootstrap/css/bootstrap.min.css') }}", // path to additional css file - us an array [] for multiple
            pageTitle: "", // add title to print page
            removeInline: true, // remove all inline styles from print elements
            printDelay: 333, // variable print delay; depending on complexity a higher value may be necessary
            header: null, // prefix to html
            formValues: true // preserve input/form values

       });
         
         //return false;
        
   });

  
 });

</script>

@endsection


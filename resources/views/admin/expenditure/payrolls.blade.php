@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>    
    <li class="breadcrumb-item active" aria-current="page">Payrolls</li>
  </ol>
</nav>
 <h3 class="page-title">Payrolls</h3>    
    <p>
        <a href="#" class="btn btn-primary print-preview" >
            Print Payroll
        </a>
    </p>
<div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped dt-select printablearea">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Surname</th>
                        <th>Firstame</th>
                        <th>Bank Name</th>
                        <th>Account Name</th>
                        <th>Acount Number</th>
                        <th>Present Salary</th>
                        <th>Adavance</th>
                        <th>Deduction</th>
                        <th>Tax</th>
                        <th>Tax ID </th>
                        <th>Payable Salary</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($payrolls) > 0)
                        @foreach ($payrolls as $pay)
                            <tr data-entry-id="{{ $pay->id }}">
                                <td>

                                </td>
                                <td>{{ $pay->SURNAME }}</td>
                                <td>{{ $pay->FIRSTNAME }}</td>
                                <td>{{ $pay->BANKNAME  }}</td>
                                <td>{{ $pay->ACCOUNTNAME }}</td>
                                <td>{{ $pay->ACCOUNTNUMBER }}</td>
                                <td>{{ $pay->PresentSalary }}</td>
                                <td>{{ $pay->Advance }}</td>
                                <td>{{ $pay->Deduction }}</td>
                                <td>{{ $pay->Tax }}</td>
                                <td>{{ $pay->TaxId }}</td>
                                <td>{{ $pay->PayableSalary }}</td>
                                                             
                               
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

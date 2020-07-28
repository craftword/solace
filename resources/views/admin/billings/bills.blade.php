@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
     <li class="breadcrumb-item"><a href="{{ route('admin.billings.index') }}">Billings</a></li>
     <li class="breadcrumb-item active" aria-current="page">Print Bill</li>
  </ol>
</nav>
    <h3 class="page-title">Billings</h3>
    
    <p> </p>
    <div class="panel panel-default">
<<<<<<< HEAD
         <div class="row">
=======
              
        <div class="panel-body"> 
             <div class="row">
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                <div class="col-md-offset-10 col-md-4">	                  
                    <a href="#" class="btn btn-primary print-preview" >
                        Print Bill
                    </a>
                </div>      	
<<<<<<< HEAD
            </div>	             
        <div class="panel-body printablearea">                                     
            <div class="row">                                             
                <div class="col-xs-offset-1 col-xs-10">                   
                   <h4 align='center'><strong>MOYE SPECIALIST HOSPITAL </strong></h4>
                   <h6 align='center'>8, GBADAMOSI STREET, YAKOYO, OJODU, LAGOS </h6>
                </div>
            </div>             
            <div class="row">
                                     
                            <div class="row table-responsive">                                
                                <div class="col-xs-offset-2 col-xs-9">                                                             
                                        <table class="table table-bordered">
                                            @if (count($procedures) > 0)
                                                <tr>
                                                    <td><strong>Procedure Cost</strong> </td><td>{{$bill->ProcedureCost}} </td>
                                                </tr>
                                            @endif
                                             @if (count($labs) > 0)
                                                <tr>
                                                    <td><strong>Laboratory Cost</strong> </td><td> {{$bill->LabCost}} </td>
                                                </tr>
                                             @endif
                                             @if (count($drugs) > 0)
                                                <tr>
                                                    <td><strong>Drug Cost</strong> </td><td> {{$bill->DrugCost}} </td>
                                                </tr>
                                             @endif
                                                <tr>
                                                    <td><strong>Overall Total Cost</strong></td><td>{{$bill->OverallCost}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Bill</strong></td><td>{{$bill->Bill}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Discount</strong></td><td>{{$bill->Discount}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Deposit</strong></td><td>{{$bill->Deposit}}</td>
                                                </tr>
        
                                                <tr>
                                                    <td><strong>Payment</strong></td><td>{{$bill->Payment}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Balance</strong></td><td>{{$bill->Balance}}</td>
                                                </tr>
                                                       
                                        </table>
                                       Date : {{$bill->created_at}} 
                                    </div>

                                
                            </div>                    
                 
                   
                    
            </div>      
                       
=======
            </div>	                               
            <div class="row table-responsive"> 
                 <div class="col-md-offset-1 col-xs-2">
                   <img src="{{ url('adminlte/img') }}/logo.jpg" class="image-responsive" />
                 </div>                               
                <div class="col-xs-7">                   
                   <h2 align='center'><strong>MOYE SPECIALIST HOSPITAL </strong></h2>
                   <h4 align='center'>8, GBADAMOSI STREET, YAKOYO, OJODU, IKEJA </h4>
                </div>
            </div>             
            <div class="row">
                 @if (count($procedures) > 0)
                        
                            <div class="row table-responsive">
                                
                                <div class="col-md-offset-1 col-xs-10">                                                             
                                        <table class="table table-bordered">
                                            <tr>
                                                <td><h4>Procedure Cost</h4> </td>
                                            </tr>
                                                @foreach ($procedures as $procedure)
                                                    <tr>
                                                        <td><strong>{{$procedure->Name }}:</strong></td><td>{{$procedure->Cost }} </td>
                                                    </tr>
                                                @endforeach
                                            <tr>
                                                <td><strong>Total:</strong> </td><td>{{$bill->ProcedureCost}} </td>
                                            </tr>
                                            </table>
                                        
                                    </div>          
                                
                            </div>
                        
                        
                    @else
                        <h2>No procedure admitted</h2>
                    @endif
            </div>      
              <div class="row">
                 @if (count($labs) > 0)
                        
                            <div class="row table-responsive">
                                
                                <div class="col-md-offset-1 col-xs-10">                                                             
                                        <table class="table table-bordered">
                                            <tr>
                                                <td><h4>Laboratory Cost</h4> </td>
                                            </tr>
                                                @foreach ($labs as $lab)
                                                    <tr>
                                                        <td><strong>{{$lab->LabTestName }}:</strong></td><td>{{$lab->LabCost }} </td>
                                                    </tr>
                                                @endforeach
                                            <tr>
                                                <td><strong>Total:</strong> </td><td> {{$bill->LabCost}} </td>
                                            </tr>
                                            </table>
                                        
                                    </div>          
                                
                            </div>
                        
                        
                    @else
                        <h2>No Laboratory Test </h2>
                    @endif
            </div>

            <div class="row">
                 @if (count($drugs) > 0)
                        
                            <div class="row table-responsive">
                                
                                <div class="col-md-offset-1 col-xs-10">                                                             
                                        <table class="table table-bordered">
                                            <tr>
                                                <td><h4>Drugs Cost</h4> </td>
                                            </tr>
                                            @foreach ($drugs as $drug)

                                                <tr>
                                                    <td><strong>{{$drug->DrugName}}</strong></td>
                                                </tr>
                                                
                                            @endforeach
                                            <tr>
                                                <td><strong>Total:</strong> </td><td> {{$bill->DrugCost}} </td>
                                            </tr>
                                            </table>
                                        
                                    </div>          
                                
                            </div>
                        
                        
                    @else
                        <h2>No Drug Prescribe </h2>
                    @endif
            </div>
            <div class="row">
                                        
                 <div class="row table-responsive">
                      <div class="col-md-offset-1 col-xs-10">          
                              <table class="table table-bordered">
                                 <tr>
                                    <td><strong>Overall Total Cost</strong></td><td>{{$bill->OverallCost}}</td><td><strong>Discount</strong></td><td>{{$bill->Discount}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Deposit</strong></td><td>{{$bill->Deposit}}</td><td><strong>Total Bill</strong></td><td>{{$bill->Bill}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Payment</strong></td><td>{{$bill->Payment}}</td><td><strong>Balance</strong></td><td>{{$bill->Balance}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Refund</strong></td><td>{{$bill->Refund}}</td>
                                </tr>          
                             </table>
                                        
                                    </div>          
                                
                            </div>
                        
                        
                   
            </div>
            
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    </div>
    
    
@stop
@section('javascript') 
<script>
$(document).ready(function(){ 
<<<<<<< HEAD
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
=======
   $('a.print-preview').on('click', function(){
       //$("#printdiv").addClass("printable");
         window.print();
         return false;
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        
   });
 });

</script>

@endsection



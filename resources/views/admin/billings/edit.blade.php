@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
     <li class="breadcrumb-item"><a href="{{ route('admin.billings.index') }}">Billings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Bill</li>
  </ol>
</nav>
    <h3 class="page-title">Billings</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.billings.store']]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>
        
        <div class="panel-body">
           <div class="row">
                 @if (count($procedures) > 0)
                        
                            <div class="row table-responsive">
                                
                                <div class="col-md-offset-1 col-xs-10">                                                             
                                        <table class="table table-bordered">
                                            <tr>
<<<<<<< HEAD
                                                <td></td><td><h4>Procedure Cost</h4> </td>
                                            </tr>
                                                @foreach ($procedures as $procedure)
                                                    <tr>
                                                        <td><input type="checkbox" value="yes" /> </td>
                                                        <td><strong>{{$procedure->Name }}:</strong></td><td><input type='text' class='form-control prodItem'  value='{{$procedure->Cost }}'/> </td>
                                                    </tr>
                                                @endforeach
                                            <tr>
                                                <td></td><td><strong>Total:</strong> </td><td> <input type='text' class='form-control prod' name='ProcedureCost' value="{{$billing['ProcedureCost']}}"/></td>
=======
                                                <td><h4>Procedure Cost</h4> </td>
                                            </tr>
                                                @foreach ($procedures as $procedure)
                                                    <tr>
                                                        <td><strong>{{$procedure->Name }}:</strong></td><td>{{$procedure->Cost }} </td>
                                                    </tr>
                                                @endforeach
                                            <tr>
                                                <td><strong>Total:</strong> </td><td> <input type='text' class='form-control prod' name='ProcedureCost' value='{{$totalProcedureCost}}'/></td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
<<<<<<< HEAD
                                                <td></td><td><h4>Laboratory Cost</h4> </td>
                                            </tr>
                                                @foreach ($labs as $lab)
                                                    <tr>
                                                        <td><input type="checkbox" value="yes" /> </td>
                                                        <td><strong>{{$lab->LabTestName }}:</strong></td><td> <input type='text' class='form-control labItems' value='{{$lab->LabCost }}'/></td>
                                                    </tr>
                                                @endforeach
                                            <tr>
                                                <td></td><td><strong>Total:</strong> </td><td> <input type='text' class='form-control lab' name='LabCost' value="{{$billing['LabCost']}}"/></td>
=======
                                                <td><h4>Laboratory Cost</h4> </td>
                                            </tr>
                                                @foreach ($labs as $lab)
                                                    <tr>
                                                        <td><strong>{{$lab->LabTestName }}:</strong></td><td>{{$lab->LabCost }} </td>
                                                    </tr>
                                                @endforeach
                                            <tr>
                                                <td><strong>Total:</strong> </td><td> <input type='text' class='form-control labs' name='LabCost' value='{{$totalLabCost}}'/></td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
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
                                                <td><h4>Drugs</h4> </td><td> <h4> Unit Cost </h4></td>
                                            </tr>
                                            @foreach ($drugs as $drug)
                                                <tr>
<<<<<<< HEAD
                                                    <td><input type="checkbox" value="yes" /></td>
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                                    <td><strong>{{$drug->DrugRoute}}&nbsp;&nbsp;  {{$drug->DrugName}}&nbsp;&nbsp;  {{$drug->DrugDose}}{{$drug->DrugDoseUnit}} &nbsp;&nbsp;  {{$drug->DrugFrequency}} X {{$drug->DrugFrequencyUnit}}&nbsp;&nbsp;  {{$drug->DrugDuration}} X {{$drug->DrugDurationUnit}}</strong></td>
                                                    <td><input type='text' class='form-control quantity'/><input type='hidden' class='form-control drugCost' value='{{$drug->Cost}}'/></td>
                                                    <td><input type='text' class='form-control prescript' id='{{$loop->iteration}}'/></td>
                                                </tr>
                                                
                                            @endforeach
                                            <tr>
<<<<<<< HEAD
                                                <td></td><td><strong>Total:</strong> </td><td></td><td> <input type='text' class='form-control drug' name='DrugCost' value="{{$billing['DrugCost']}}"/></td></td>
=======
                                                <td><strong>Total:</strong> </td><td></td><td> <input type='text' class='form-control drug' name='DrugCost'/></td></td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                            </tr>
                                            </table>
                                        
                                    </div>          
                                
                            </div>
                        
                        
                    @else
                        <h2>No Drug Prescribe </h2>
<<<<<<< HEAD

                    @endif

            </div>
             <div class="row">
                                        
                 <div class="row table-responsive">
                      <div class="col-md-offset-1 col-xs-10">          
                              <table class="table table-bordered">
                                <tr>
                                    <td><strong>Miscellaneous</strong></td><td><input type='text' class='form-control miscellaneous' name='Miscellaneous' /></td>
                                    <td><strong>Payment Type</strong></td>
                                    <td>
                                        <select class='form-control PaymentType' name='PaymentType'>
                                            <option value="CASH">CASH</option>
                                            <option value="POS">POS</option>
                                            <option value="BANK TRANSFER">BANK TRANSFER</option>
                                            <option value="HMO">HMO</option>
                                            <option value="CASH/TRANSFER">CASH/TRANSFER</option>
                                            <option value="CASH/POS">CASH/POS</option>
                                            <option value="CHEQUE">CHEQUE</option>
                                        </select>
                                    </td>
                                </tr>
                                    
                             </table>
                                        
                                    </div>          
                                
                            </div>
                        
                        
                   
            </div>                      
=======
                    @endif
            </div>
                                   
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            
            <div class="row">
                                        
                 <div class="row table-responsive">
                      <div class="col-md-offset-1 col-xs-10">          
                              <table class="table table-bordered">
                                <tr>
<<<<<<< HEAD
                                    <td><strong>Overall Total Cost</strong></td><td><input type='text' class='form-control overall' name='OverallCost' value="{{$billing['OverallCost']}}"/></td><td><strong>Discount</strong></td><td><input type='text' class='form-control discount' name='Discount' value="{{$billing['Discount']}}"/></td>
                                </tr>
                                <tr>
                                    <td><strong>Total Bill</strong></td><td><input type='text' class='form-control bill' name='Bill' value="{{$billing['Bill']}}"/></td><td><strong>Deposit</strong></td><td><input type='text' class='form-control deposit' name='Deposit' value="{{$familyDeposit}}"/></td>
                                </tr>
                                <tr>
                                    <td><strong>Payment</strong></td><td><input type='text' class='form-control payment' name='Payment' value="{{$billing['Payment']}}"/></td><td><strong>Balance</strong></td><td><input type='text' class='form-control balance' name='Balance' value="{{$billing['Balance']}}"/></td>
                                </tr>
                                <tr>
                                    <td><strong>Refund</strong></td><td><input type='text' class='form-control refund' name='Refund' value="{{$billing['Refund']}}"/></td><td><strong>Outstanding </strong></td><td><input type='text' class='form-control outstand' value="{{$billing['Balance']}}"  /></td>
                                </tr>          
                             </table>
                                        
                            </div>          
                                
                     </div>                       
=======
                                    <td><strong>Overall Total Cost</strong></td><td><input type='text' class='form-control overall' name='OverallCost'/></td><td><strong>Discount</strong></td><td><input type='text' class='form-control discount' name='Discount'/></td>
                                </tr>
                                <tr>
                                    <td><strong>Deposit</strong></td><td><input type='text' class='form-control deposit' name='Deposit'/></td><td><strong>Total Bill</strong></td><td><input type='text' class='form-control bill' name='Bill'/></td>
                                </tr>
                                <tr>
                                    <td><strong>Payment</strong></td><td><input type='text' class='form-control payment' name='Payment'/></td><td><strong>Balance</strong></td><td><input type='text' class='form-control balance' name='Balance'/></td>
                                </tr>
                                <tr>
                                    <td><strong>Refund</strong></td><td><input type='text' class='form-control refund' name='Refund'/></td><td><strong>Outstanding </strong></td><td><input type='text' class='form-control outstand' value="{{$billing}}"  /></td>
                                </tr>          
                             </table>
                                        
                                    </div>          
                                
                            </div>
                        
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                        
                   
            </div>
            <div class="row">
                <div class="col-md-offset-10 col-xs-2 form-group">
                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::hidden('biodata_id', $history->biodata_id) !!}
            {!! Form::hidden('clinicHistory_id', $history->id) !!}
            {!! Form::close() !!}   
        </div>
    </div>
    
    
@stop
@section('javascript') 
    <script>
<<<<<<< HEAD
    // disable a row 
    $("input:checkbox").on('change', function() {
       //$(this).find("input,button,textarea,select").prop( "disabled", true );
       var $box = $(this);
       if ($box.is(":checked")) {
            $(this).closest('tr').find('input:text').prop( "disabled", true );
       }
       else {
             $(this).closest('tr').find('input:text').prop( "disabled", false );
       }

    });
    //calculate total of Procedure 
     $('.prod').on('focus', function(){
         var total = 0;
         $('.prodItem').each(function(){
             if ($(this).prop('disabled') == false) {
                 total += Number($(this).val());
             }
             else {
                 total += 0;
             }
           
        });
        $('.prod').val(total);

    });

    //calcculate total lab
    $('.lab').on('focus', function(){
        var total = 0;
         $('.labItems').each(function(){
            if ($(this).prop('disabled') == false) {
                 total += Number($(this).val());
             }
             else {
                 total += 0;
             }            
        });
        $('.lab').val(total);

    });

    //get cost of each drug 
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
    $('.prescript').on('focus', function(){
         var quantity = [];
         var cost = [];
         var total = 0;
         var id = $(this).attr('id') - 1;         
         console.log(id);
         
         $('.quantity').each(function(){
            quantity.push(Number($(this).val()));            
        });
        $('.drugCost').each(function(){
            cost.push(Number($(this).val()));            
        });
       
        total = quantity[id] * cost[id];
        $(this).val(total);
     });

<<<<<<< HEAD
   // calculate total cost of drug
    $('.drug').on('focus', function(){
          var total = 0;
        $('.prescript').each(function(){
           if ($(this).prop('disabled') == false) {
                 total += Number($(this).val());
             }
             else {
                 total += 0;
             }            
=======
    $('.drug').on('focus', function(){
          var total = 0;
        $('.prescript').each(function(){
            total += Number($(this).val());            
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        });
        $('.drug').val(total);

     });

<<<<<<< HEAD
     // calculate the overall cost
    $('.overall').on('focus', function(){
        //console.log($('.labs').val());
        //var labtotal = 0;
        if ($('.lab').val() == undefined) {
            var labtotal = 0;
            
        }else {
          var labtotal = Number($('.lab').val());  
=======
    $('.overall').on('focus', function(){
        //console.log($('.labs').val());
        //var labtotal = 0;
        if ($('.labs').val() == undefined) {
            var labtotal = 0;
            
        }else {
          var labtotal = Number($('.labs').val());  
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        }

        // check edge case for procedure
        if ($('.prod').val() == undefined) {
            var prodtotal = 0;
            
        }else {
          var prodtotal = Number($('.prod').val());  
        }

        // check edge case for drug
        if ($('.drug').val() == undefined) {
            var drugtotal = 0;
            
        }else {
          var drugtotal = Number($('.drug').val());  
        }

<<<<<<< HEAD
        var total = Number(prodtotal + labtotal + drugtotal + Number($('.miscellaneous').val()));
=======
        var total = Number(prodtotal + labtotal + drugtotal);
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        
        $('.overall').val(total);
     });

    $('.bill').on('focus', function(){
<<<<<<< HEAD
        var total = Number ($('.overall').val()) - Number($('.discount').val()) ;
=======
        var total = Number ($('.overall').val()) - (Number($('.discount').val()) + Number($('.deposit').val()));
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
        $('.bill').val(total);
     });
    

    $('.balance').on('focus', function(){
<<<<<<< HEAD
        var total = (Number($('.bill').val()) + Number($('.outstand').val())) - (Number($('.payment').val()) + Number($('.deposit').val()));
=======
        var total = Number($('.bill').val()) + Number($('.outstand').val()) - Number($('.payment').val());
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            if(total > 0) {
                $('.balance').val(total);      
                $('.refund').val(0); 
            }
            else {
                 $('.balance').val(0);      
<<<<<<< HEAD
                 $('.refund').val(Math.abs(total)); 
=======
                 $('.refund').val(total); 
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            }
           
       
        
     });

    
    </script>

@endsection


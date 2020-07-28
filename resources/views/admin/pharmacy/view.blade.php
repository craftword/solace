@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.pharmacy.index') }}">Pharmacy</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Drug</li>
  </ol>
</nav>
    <h3 class="page-title">Pharmacy Inventory</h3>
    

    <div class="panel panel-default">
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-offset-3 col-xs-8">
                    <h1> {{$drugs->DrugName}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-xs-10">
                    <div class="row table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Brand Name</strong></td><td>{{ $drugs->BrandName }}</td> <td><strong>Quantity</strong></td><td>{{ $drugs->Quantity}}</td><td><strong>DrugType</strong></td><td>{{ $drugs->DrugType}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Unit Dose </strong></td><td>{{ $drugs->UnitDose  }}</td> <td><strong>Batch Number</strong></td><td>{{ $drugs->BatchNumber}}</td><td><strong>Expiry Date</strong></td><td>{{ $drugs->ExpiryDate}}</td>
                                </tr>
                                
                                <tr>
<<<<<<< HEAD
                                    <td><strong>Purchase Date</strong></td><td>{{ $drugs->PurchaseDate }}</td> <td><strong>Unit Cost </strong></td><td>{{ $drugs->UnitCost }}</td><td><strong>Minimum Stock </strong></td><td>{{ $drugs->minStock }}</td>
=======
                                    <td><strong>Purchase Date</strong></td><td>{{ $drugs->PurchaseDate }}</td> <td><strong>Unit Cost </strong></td><td>{{ $drugs->UnitCost }}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                </tr>
                                
                            </table>
                        </div>            
                    
                </div>
            </div>
        </div>
        
    </div>

@stop


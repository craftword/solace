@extends('layouts.app')

@section('content')
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
<<<<<<< HEAD
</nav> 
@if ($message = Session::get('failure'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $message }}</strong>
		</div>
@endif              
@can('users_manage')
<div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-danger">{{$currentEmployees}}</span></div>
                                        <div>Total Number of Users</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-home fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-primary">7</span></div>
                                        <div>Total Number of Departments</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-rub fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{count($user->unreadNotifications)}}</span></div>
                                        <div>Total of Users</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                 <!-- /.row -->
            </div>
    </div>

 @endcan
 @can('manage_accounts')
  <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-danger">{{$totalincomes}}</span></div>
                                        <div>Monthly Income</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-euro fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{$totalexpenditures}}</span></div>
                                        <div>Monthly Expenditure</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-rub fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{$totalpayable}}</span></div>
                                        <div>Total Account Payable</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-rupee fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-danger">{{$totalreceiveable}}</span></div>
                                        <div>Total Account Receivable</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-rupee fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">                                                                             
                                        <div class="huge"><span class="badge badge-pill badge-warning">{{$totalhmoreceiveable}}</span></div>
                                        <div>HMO Recieveable</div>                                      
                                         
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
    </div>
 <div class="row">
        <div class="col-xs-6">           
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Income Chart
                </div>
                <div class="panel-body">
                    <div id="income"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Expenditure Chart
                </div>
                <div class="panel-body">
                <div id="expense"></div>
                </div>
            </div>
        </div> 
</div>
<div class="row">
        <div class="col-xs-6">           
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Monthly Patients Chart
                </div>
                <div class="panel-body">
                    <div id="patient"></div>
                </div>
            </div>
        </div>       
        
</div>  
 @endcan
 @can('manage_waiting_patient')
  <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
=======
</nav>               
<div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
<<<<<<< HEAD
                                        <div class="huge"><span class="badge badge-pill badge-danger">{{$countAllPatients}} </span></div>
=======
                                        <div class="huge"><span class="badge badge-pill badge-danger">{{$countAllPatients}}</span></div>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                        <div>Total Number of Patients!</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-stethoscope fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{$countPatientsWait}}</span></div>
                                        <div>Number of Patients in waiting!</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bell fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
<<<<<<< HEAD
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{count($user->unreadNotifications)}}</span></div>
=======
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{ count($notifications)}}</span></div>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                        <div>Total Number of Notification!</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
<<<<<<< HEAD
                                    <div class="col-xs-9 text-right">                                                                        
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{ count($activities)}}</span></div>
                                        <div>Total Number of Activities!</div>
                                                                               
=======
                                    <div class="col-xs-9 text-right"> 
                                        @can('doctor_patients')                                       
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{ count($activities)}}</span></div>
                                        <div>Total Number of Activities!</div>
                                        @endcan
                                         @can('edit_pharmacy')                                       
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{ count($activities)}}</span></div>
                                        <div>Total Number of Activities!</div>
                                        @endcan
                                         @can('manage_lab')                                       
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{ count($activities)}}</span></div>
                                        <div>Total Number of Activities!</div>
                                        @endcan
                                        @can('nurse_patients')
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{ count($nurseactivities)}}</span></div>
                                        <div>Total Number of Activities!</div>
                                        @endcan
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
                <!-- /.row -->   
               
            </div>
    </div>
@endcan
@can('manage_pasthistoryrecords') 
<div class="panel panel-primary">
    <div class="panel-body">
      <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-body">
                    @can('manage_patients') 
                     <h1> FRONT DESK </h1>                        
                    @endcan
=======
                <!-- /.row -->
            </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-body">
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                    @can('doctor_patients') 
                        <p><strong>Activities</strong></p>
                        <hr />
                        <table class="table table-bordered">

                            @if (count($activities) > 0)
                                @foreach ($activities as $activity)
                                    <tr>
<<<<<<< HEAD
                                      <td>{{$activity->id}}</td> <td>{{$activity->action}}</td><td>By {{$activity->username}}</td><td>{{$activity->created_at }}</td>
=======
                                        <td>{{$activity->id}}</td> <td>{{$activity->action}}</td><td>By {{$activity->username}}</td><td>{{$activity->created_at }}</td>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                    </tr>
                                @endforeach
                            @else
                                <strong>No Records found</strong>
                            @endif
                        </table>
                        {!! $activities->render() !!}
                    @endcan
                    @can('nurse_patients')
                        <p><strong>Activities</strong></p>
                        <hr />
                        <table class="table table-bordered">

                            @if (count($nurseactivities) > 0)
                                @foreach ($nurseactivities as $activity)
                                    <tr>
                                        <td>{{$activity->id}}</td> <td>{{$activity->action}}</td><td>By {{$activity->username}}</td><td>{{$activity->created_at }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <strong>No Records found</strong>
                            @endif
                        </table>
                        {!! $nurseactivities->render() !!}

                    @endcan

                </div>
            </div>
<<<<<<< HEAD
        </div>        
              
            <div class="col-xs-6">
             @can('view_pending_balance')  
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <p><strong>Check For Balance</strong></p>
                        <hr />
                        <div class='row'>
                            <div class="col-xs-4 form-group">
                                {!! Form::text('Firstname', old('Firstname'), ['class' => 'form-control Firstname', 'Placeholder'=>'Firstname']) !!}
                            </div>
                            <div class="col-xs-4 form-group">
                                {!! Form::text('Surname', old('Surname'), ['class' => 'form-control Surname', 'Placeholder'=>'Surname']) !!}
                            </div>
                            <div class="col-xs-3 form-group">
                                <button class="btn btn-primary checkbalance"> Check </button> 
                                                  
                            </div>
                        </div>            
                        <div class='row'>
                            <div class="col-xs-7 form-group balanceResult">

                            </div>
                        </div>
                    </div>
                </div>
                @endcan
           
            <div class="panel panel-primary">
                <div class="panel-body">
                    <p><strong>Check For Patient Histories</strong></p>
                    <hr />
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/clinics/checkPastHistories']) !!}
                    <div class='row'>
                        <div class="col-xs-4 form-group">
				             {!! Form::text('Firstname', old('Firstname'), ['class' => 'form-control Firstname', 'Placeholder'=>'Firstname']) !!}
                        </div>
                        <div class="col-xs-4 form-group">
				             {!! Form::text('Surname', old('Surname'), ['class' => 'form-control Surname', 'Placeholder'=>'Surname']) !!}
                        </div>
                        <div class="col-xs-3 form-group">
				        {!! Form::submit(trans('Check'), ['class' => 'btn btn-default']) !!}             
				        </div>
                    </div>           
                    
                </div>
            </div>
        </div>
      
    </div>
    <!-- End of notification -->
    </div>
</div>
 @endcan 
 @can('manage_store')
  <h1> Store Section </h2>
<div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-danger">{{$drugsCounts}}</span></div>
                                        <div>Total Number of Drugs</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-home fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{$drugLog}}</span></div>
                                        <div>Monthly Store Withdrawals</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-rub fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{$requisitions}}</span></div>
                                        <div>Monthly Requisition</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-rub fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{$expiry}}</span></div>
                                        <div>Monthly Expired Drugs</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                 <!-- /.row -->
            </div>
    </div>
 @endcan
 @can('manage_hmo')
  <h1> HMO Section </h2>
  <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-danger">{{$hmoCounts}}</span></div>
                                        <div>Number HMO</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-home fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{$hmoEnrollees}}</span></div>
                                        <div>Number of HMO Enrollees</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-rub fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span class="badge badge-pill badge-primary">{{$totalhmoreceiveable}}</span></div>
                                        <div>Total of Unpaid Claims</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                 <!-- /.row -->
            </div>
    </div>
 @endcan
 @can('manage_hr')
  <div class="panel panel-primary">
    <div class="panel-body">
      <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-body">                   
                   	<div class="row table-responsive">
		                    			<table class="table table-bordered">
								  			<thead>
			                    				<tr>
				                    				<th><strong>ITEM</strong></th>
							                        <th><strong>TOTAL</strong></th>
							                        						                        
							                    </tr>
					                    	</thead>
						                    <tbody>
						                    	<tr><td> Current Employees </td>  <td><span class="badge badge-primary">{{$currentEmployees}} </span></td></tr>
                                                <tr><td> Attrition </td>  <td><span class="badge badge-danger">{{$attrition}} </span></td></tr>
                                                <tr><td> New Hire </td>  <td><span class="badge badge-success">{{$newHire}} </span></td></tr>
                                                
						                    </tbody>
								  		</table>
                    </div>

                </div>
            </div>
        </div>        
              
        <div class="col-xs-6">            
           <div class="panel panel-primary">
                <div class="panel-heading">
                   Birthdays in {{date('F')}}
                </div>
                <div class="panel-body">
                   @if (count($birthdays) > 0)
                        <div class="row table-responsive">
		                    <table class="table table-bordered">
                                 <tbody>
                                    @foreach($birthdays as $birthday)
                                    <tr> <td><strong>{{$birthday->FIRSTNAME}}  {{$birthday->SURNAME}}</strong></td></tr>
                                    @endforeach
                                </tbody>
							</table>
                        </div>

                  @else 
                    <h4> No Birthdays!!! </h4>
                   @endif
                      
                </div>
            </div>
        </div>
      
    </div>
    <!-- End of notification -->
    </div>
</div>
 @endcan

@can('view_stats')
  <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                 <h3><strong>Statistics</strong></h3>
                                     <hr />  
                    
            <div class="box box-solid">
                <div class="box-body">
                  <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Diseases
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">
                            <div class="row">
				            	<div class="col-md-offset-1 col-xs-2 form-group">
				                    {!! Form::label('Name', 'Name of Disease*', ['class' => 'control-label']) !!}
				                    {!! Form::text('Name', old('Name'), ['id' => 'name','class' => 'form-control']) !!}
				                   
				                </div>
                                <div class="col-xs-2 form-group">
				                    {!! Form::label('Age', 'Age Group*', ['class' => 'control-label']) !!}
				                     {!! Form::select('Age', ['All' => 'All', 'Neonate' => 'Neonate', 'Infant' => 'Infant', 'Preschool' => 'Preschool', 'Middle children' => 'Middle children', 'Adult' => 'Adult'], null, ['id' => 'age','class' => 'form-control']); !!}
				                   
				                </div>
                                <div class="col-xs-2 form-group">
				                    {!! Form::label('Gender', 'Gender*', ['class' => 'control-label']) !!}
				                    {!! Form::select('Gender', ['All' => 'All', 'Male' => 'Male', 'Female' => 'Female'], null, ['id' => 'gender','class' => 'form-control']); !!}
				                   
				                </div>
                                <div class="col-xs-2 form-group">
				                    {!! Form::label('Startdate', 'Start date*', ['class' => 'control-label']) !!}
				                     {!! Form::date('Startdate', old('Startdate'), ['id' => 'start','class' => 'form-control']) !!}
				                   
				                </div>
                                <div class="col-xs-2 form-group">
				                    {!! Form::label('Enddate', 'End date*', ['class' => 'control-label']) !!}
				                     {!! Form::date('Enddate', old('Enddate'), ['id' => 'end','class' => 'form-control']) !!}
				                   
				                </div>
				               

				    </div>
                    <div class="row">
                        <div class="col-md-offset-10 col-xs-2 form-group">
                           <button class="btn btn-primary disease"> Get Statistics </button>
                        </div>
                    </div>
                    <hr />
                     <div class="row">
                        <div class="col-md-offset-1 col-xs-10 form-group result">
                            
                        </div>
                    </div> 
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-danger">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Procedures
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="box-body">
                          .<div class="row">
				            	<div class="col-md-offset-1 col-xs-3 form-group">
				                    {!! Form::label('Name', 'Name of Procedure*', ['class' => 'control-label']) !!}
				                    {!! Form::text('Name', old('Name'), ['id' => 'name1','class' => 'form-control']) !!}
				                   
				                </div>
                                
                                <div class="col-xs-3 form-group">
				                    {!! Form::label('Startdate', 'Start date*', ['class' => 'control-label']) !!}
				                     {!! Form::date('Startdate', old('Startdate'), ['id' => 'start1','class' => 'form-control']) !!}
				                   
				                </div>
                                <div class="col-xs-2 form-group">
				                    {!! Form::label('Enddate', 'End date*', ['class' => 'control-label']) !!}
				                     {!! Form::date('Enddate', old('Enddate'), ['id' => 'end1','class' => 'form-control']) !!}
				                   
				                </div>
				               

				    </div>
                    <div class="row">
                        <div class="col-md-offset-10 col-xs-2 form-group">
                            <button class="btn btn-danger procedure1"> Get Statistics </button>
                        </div>
                    </div>
                    <hr />
                     <div class="row">
                        <div class="col-md-offset-1 col-xs-10 form-group procedure">
                            
                        </div>
                    </div> 
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Lab Tests
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="box-body">
                          .<div class="row">
				            	<div class="col-md-offset-1 col-xs-3 form-group">
				                    {!! Form::label('Name', 'Name of Lab Test*', ['class' => 'control-label']) !!}
				                    {!! Form::text('Name', old('Name'), ['id' => 'name2','class' => 'form-control']) !!}
				                   
				                </div>
                                
                                <div class="col-xs-3 form-group">
				                    {!! Form::label('Startdate', 'Start date*', ['class' => 'control-label']) !!}
				                     {!! Form::date('Startdate', old('Startdate'), ['id' => 'start2','class' => 'form-control']) !!}
				                   
				                </div>
                                <div class="col-xs-2 form-group">
				                    {!! Form::label('Enddate', 'End date*', ['class' => 'control-label']) !!}
				                     {!! Form::date('Enddate', old('Enddate'), ['id' => 'end2','class' => 'form-control']) !!}
				                   
				                </div>
				               

				    </div>
                    <div class="row">
                        <div class="col-md-offset-10 col-xs-2 form-group">
                            <button class="btn btn-success lab1"> Get Statistics </button>
                        </div>
                    </div>
                    <hr />
                     <div class="row">
                        <div class="col-md-offset-1 col-xs-10 form-group lab">
                            
                        </div>
                    </div> 
                        </div>
                      </div>
                    </div>
                    
                   <div class="panel box box-warning">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Monthly Patients Statistics
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="box-body">
                          .<div class="row">
				            	                                
                                <div class="col-xs-4 form-group">
				                    {!! Form::label('Startdate', 'Start date*', ['class' => 'control-label']) !!}
				                     {!! Form::date('Startdate', old('Startdate'), ['id' => 'start3','class' => 'form-control']) !!}
				                   
				                </div>
                                <div class="col-xs-4 form-group">
				                    {!! Form::label('Enddate', 'End date*', ['class' => 'control-label']) !!}
				                     {!! Form::date('Enddate', old('Enddate'), ['id' => 'end3','class' => 'form-control']) !!}
				                   
				                </div>
				              
				    </div>
                    <div class="row">
                        <div class="col-md-offset-10 col-xs-2 form-group">
                             <button class="btn btn-warning allPatients"> Get Statistics </button>
                        </div>
                    </div>
                    <hr />
                     <div class="row">
                        <div class="col-md-offset-1 col-xs-10 form-group patient">
                            
                        </div>
                    </div> 
                        </div>
                      </div>
                    </div>

                    <div class="panel box box-default">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                            Admission Patients Statistics
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFive" class="panel-collapse collapse">
                        <div class="box-body">
                          .<div class="row">
				            	                                
                                <div class="col-xs-4 form-group">
				                    {!! Form::label('Startdate', 'Start date*', ['class' => 'control-label']) !!}
				                     {!! Form::date('Startdate', old('Startdate'), ['id' => 'start4','class' => 'form-control']) !!}
				                   
				                </div>
                                <div class="col-xs-4 form-group">
				                    {!! Form::label('Enddate', 'End date*', ['class' => 'control-label']) !!}
				                    {!! Form::date('Enddate', old('Enddate'), ['id' => 'end4','class' => 'form-control']) !!}
				                   
				                </div>
				              
				    </div>
                    <div class="row">
                        <div class="col-md-offset-10 col-xs-2 form-group">
                           <button class="btn btn-default admission"> Get Statistics </button>
                           
                        </div>
                    </div>
                    <hr />
                     <div class="row">
                        <div class="col-md-offset-1 col-xs-10 form-group admission">
                            
                        </div>
                    </div> 
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
@endcan
            
@endsection
@section('javascript') 
<script>
//check balance
$('.checkbalance').on('click', function(){
    $.ajax({
		data: {
			Firstname: $('.Firstname').val(),
            Surname: $('.Surname').val(),
            token: '{!! csrf_token() !!}'
			},
		    url:'checkBalanceStatus',
		    method: 'GET',
		    dataType: 'json',
		    success:function(data) { 
                var count = data.length;
                console.log(count);
                if(count > 0) {
                    var html = "<strong>Balance:" +data[0].Balance + "</strong>";
                } else {
                    var html = "No Billing yet!!"
                }
                 $('.balanceResult').empty();
                $('.balanceResult').append(html);
                //console.log(data);
            }
    }); 
   
});
// get disease count 
   $('.disease').on('click', function(){
       	var a = 1;	 
            //console.log($('#name').val());
         	$.ajax({
				data: {
					Name: $('#name').val(),
                    Age: $('#age').val(),
                    Gender: $('#gender').val(),
                    Startdate: $('#start').val(),
                    Enddate: $('#end').val(),
					_token: '{!! csrf_token() !!}'
				},
		    	url:'getStat',
		        method: 'GET',
		        dataType: 'json',
		        success:function(data) {  
                    var count = Object.values(data);                
                    var html = "<div class='row table-responsive'><strong>Total Count: "+count.length+"</strong><p> </p> <table class='table table-bordered'>";
                       html+= "<thead><tr><th>No.</th><th>Name</th><th>SEX</th><th>AGE</th></tr></thead><tbody>";
						$.each(data, function(i, d) {                                             
                           html += "<tr><td>"+a+"</td><td>"+d.Surname+"-"+d.Firstname+"</td><td>"+d.Sex+"</td><td>"+getAge(d.Birthdate)+"</td></tr>";					                    	
                           a++;
                         });					
					   html+= "</tbody></table></div>";	
                       $('.result').empty();
                       $('.result').append(html);				
						            

								
							
                }
            });
    });

  // Procedure
  $('.procedure1').on('click', function(){
      var a = 1;
    $.ajax({
		data: {
			Name: $('#name1').val(),
            Startdate: $('#start1').val(),
            Enddate: $('#end1').val(),
			_token: '{!! csrf_token() !!}'
			},
		    url:'getStatProcedure',
		    method: 'GET',
		    dataType: 'json',
		    success:function(data) {  
                var count = Object.values(data);                
                var html = "<div class='row table-responsive'><strong>Total Count: "+count.length+"</strong><p> </p> <table class='table table-bordered'>";
                    html+= "<thead><tr><th>No.</th><th>Name</th><th>Procedure Name</th><th>AGE</th><th>DATE</th></tr></thead><tbody>";
					$.each(data, function(i, d) {                                             
                           html += "<tr><td>"+a+"</td><td>"+d.Name+"</td><td>"+d.ProcedureName+"</td><td>"+getAge(d.Age)+"</td><td>"+d.Date+"</td></tr>";					                    	
                           a++;
                    });					
					html+= "</tbody></table></div>";	
                    $('.procedure').empty();
                    $('.procedure').append(html);				
						            

								
			
                //console.log(data);			
                }
            });

  });  

  
  //lab 
   $('.lab1').on('click', function(){
      var a = 1;
    $.ajax({
		data: {
			Name: $('#name2').val(),
            Startdate: $('#start2').val(),
            Enddate: $('#end2').val(),
			_token: '{!! csrf_token() !!}'
			},
		    url:'getStatLab',
		    method: 'GET',
		    dataType: 'json',
		    success:function(data) {  
                var count = Object.values(data);                
                var html = "<div class='row table-responsive'><strong>Total Count: "+count.length+"</strong><p> </p> <table class='table table-bordered'>";
                    html+= "<thead><tr><th>No.</th><th>Name</th><th>Lab Test</th><th>AGE</th><th>DATE</th></tr></thead><tbody>";
					$.each(data, function(i, d) {                                             
                           html += "<tr><td>"+a+"</td><td>"+d.Name+"</td><td>"+d.Labtest+"</td><td>"+getAge(d.Age)+"</td><td>"+d.Date+"</td></tr>";					                    	
                           a++;
                    });					
					html+= "</tbody></table></div>";	
                    $('.lab').empty();
                    $('.lab').append(html);				
						            

								
			
                //console.log(data);			
                }
            });

  }); 

 // All Patients
$('.allPatients').on('click', function(){
      var a = 1;
    $.ajax({
		data: {
			Startdate: $('#start3').val(),
            Enddate: $('#end3').val(),
			_token: '{!! csrf_token() !!}'
			},
		    url:'getAllPatients',
		    method: 'GET',
		    dataType: 'json',
		    success:function(data) {  
                console.log(data);
                var count = Object.values(data);                
                var html = "<div class='row table-responsive'><strong>Total Count: "+count.length+"</strong><p> </p> <table class='table table-bordered'>";
                     html+= "<thead><tr><th>No.</th><th>Name</th><th>AGE</th><th>Presenting Complaint</><th>Diagnosis</th><th>DATE</th></tr></thead><tbody>";
					$.each(data, function(i, d) {                                             
                           html += "<tr><td>"+a+"</td><td>"+d.Name+"</td><td>"+getAge(d.Age)+"</td><td>"+d.PresentingComplaint+"</td><td>"+d.Diagnosis+"</td><td>"+d.Date+"</td></tr>";					                    	
                           a++;
                    });					
					html+= "</tbody></table></div>";	
                    $('.patient').empty();
                    $('.patient').append(html);						            
                  			
			
                			
                }
            });

  }); 

  // Admission
  $('.admission').on('click', function(){
      var a = 1;
    $.ajax({
		data: {
			Startdate: $('#start4').val(),
            Enddate: $('#end4').val(),
			_token: '{!! csrf_token() !!}'
			},
		    url:'getAllPatientsOnAdmission',
		    method: 'GET',
		    dataType: 'json',
		    success:function(data) {  
                var count = Object.values(data);                
                var html = "<div class='row table-responsive'><strong>Total Count: "+count.length+"</strong><p> </p> <table class='table table-bordered'>";
                    html+= "<thead><tr><th>No.</th><th>Name</th><th>AGE</th><th>DATE</th></tr></thead><tbody>";
					$.each(data, function(i, d) {                                             
                           html += "<tr><td>"+a+"</td><td>"+d.Name+"</td><td>"+getAge(d.Age)+"</td><td>"+d.Date+"</td></tr>";					                    	
                           a++;
                    });					
					html+= "</tbody></table></div>";	
                    $('.admission').empty();
                    $('.admission').append(html);						            
                    
								
			
                //console.log(data);			
                }
            });

  });
  function getAge(dateString) 
{
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    var result = 0
    if (age == 0) {
        result = m + "months";
    }
    else {
        result = age;
    }
    return result;
}
</script>
<script>
   // Chart sections
   // Income yearly Chart
    var data = {!!json_encode($yearlyincomes) !!};
    console.log(data);
    Morris.Line({
            element:'income',
            data: data,
            xkey: 'month',
            ykeys: ['value'],
            parseTime:false,
            labels: ['Total Income']
        });

// Expenditure Yearly chart
var data = {!!json_encode($yearlyexpenses) !!};
    console.log(data);
    Morris.Line({
            element:'expense',
            data: data,
            xkey: 'month',
            ykeys: ['value'],
            parseTime:false,
            labels: ['Total Expenditure']
    });

// Monthly Visit Patient chart
 var data = {!!json_encode($yearlypatients) !!};
    Morris.Bar({
        element: 'patient',
        data: data,
        xkey: 'month',
        ykeys: ['value'],
        parseTime:false,                                
        labels: ['Number of Patients'],
});
                           

    




</script>

@endsection
=======
        </div>
         <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <p><strong>Notifications</strong></p>
                    <hr />
                   <table class="table table-bordered">
                        @if (count($notifications) > 0)
                            
                            @foreach ($notifications as $notification)
                                <tr>
                                    <td>{{$notification->sendername }}</td><td><a href="#exampleModal" class="message" data-toggle="modal"  data-id="{{$notification->message}}">message</a></td><td>{{$notification->created_at }}</td>
                                </tr>
                                
                            @endforeach
                        @else
                            <strong>No Records found</strong>
                        @endif
                    </table>
                    {!! $notifications->render() !!}
                </div>
            </div>
        </div>
    </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                
                          </div>
                        </div>
                    </div>

            </div>
@endsection
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35

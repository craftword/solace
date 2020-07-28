@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.manpower.index') }}">Talent Management</a></li>  
    <li class="breadcrumb-item active" aria-current="page">Training</li>
  </ol>
</nav>

<div class="panel panel-default">
    <div class="panel-heading">
        Professional Development Plan
    </div>
	
    <div class="row">
        <div class="col-md-offset-1 col-xs-10">
		        <table class="table table-bordered">
		            <tr>
                       <th>Surname</>
                       <th>First Name</th>
                       <th>Need Assessment</th>
                       <th>Learning Objectives</th>
                       <th>Training Mode</th>
                       <th>Training Duration</th>
                       <th>Training Timeline</th>
                       <th>Year</th>
                       <th>Budget</th>
		            </tr>
                    @foreach($manplanning as $plan)
                    <tr>
                        <td>{{$plan['Surname']}}</td>
                        <td>{{$plan['FirstName']}}</td>
                        <td>{{$plan['NeedAssessment']}}</td>
                        <td>{{$plan['LearningObjectives']}}</td>
                        <td>{{$plan['TrainingMode']}}</td>
                        <td>{{$plan['TrainingDuration']}}</td>
                        <td>{{$plan['TrainingTimeline']}}</td>
                        <td>{{$plan['Year']}}</td>
                        <td>{{$plan['Budget']}}</td>
                    </tr>
                    @endforeach
		        </table>
        </div>
	</div>
</div>
@endsection
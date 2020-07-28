@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a>Talent Management</a></li>
  </ol>
</nav>
    
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Training Forecast</h4>
    </div>
	
    <div class="row">
        <div class="col-md-offset-0 col-xs-12">
		        <table class="table table-bordered">
		            <tr>
                       <th>Surname</th>
                       <th>FirstName</th>
                       <th>CurrentPosition</th>
                       <th>LearningObjectives</th>
                       <th>TrainingMode</th>
                       <th>TrainingDuration</th>
                       <th>TrainingTimeline></th>
                       <th>Year</th>
                       <th>Budget</th>
                       <th>Evaluation</th>
                       <th>evaluation_done_by</th>
		            </tr>
                    @foreach($manpowers as $manpower)
                    <tr>
                        <td>{{$manpower['Surname']}}</td>
                        <td>{{$manpower['FirstName']}}</td>
                        <td>{{$manpower['CurrentPosition']}}</td>
                        <td>{{$manpower['LearningObjectives']}}</td>
                        <td>{{$manpower['TrainingMode']}}</td>
                        <td>{{$manpower['TrainingDuration']}}</td>
                        <td>{{$manpower['TrainingTimeline']}}</td>
                        <td>{{$manpower['Year']}}</td>
                        <td>{{$manpower['Budget']}}</td>
                        <td>{{$manpower['Evaluation']}}</td>
                        <td>{{$manpower['evaluation_done_by']}}</td>
                    </tr>
                    @endforeach
		        </table>
        </div>
	</div>
</div>
@endsection   
@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.talent.index') }}">Talent Management</a></li>  
    <li class="breadcrumb-item active" aria-current="page">Interview</li>
  </ol>
</nav>

<div class="panel panel-default">
    <div class="panel-heading">
        Interview Report
    </div>
	
    <div class="row">
        <div class="col-md-offset-0 col-xs-10">
		        <table class="table table-bordered">

                @foreach($entryInterview as $interview)
		                 <tr>
                       <th>Surname</>
                       <td>{{$interview['Surname']}}</td>
                     </tr>
                     <tr>
                       <th>First Name</th>
                       <td>{{$interview['FirstName']}}</td>
                     </tr>
                     <tr>
                       <th>PositionRequested</th>
                       <td>{{$interview['PositionRequested']}}</td>
                     </tr>
                     <tr>
                       <th>Appearance</th>
                       <td>{{$interview['Appearance']}}</td>
                     </tr>
                     <tr>
                       <th>Communication</th>
                       <td>{{$interview['Communication']}}</td>
                     </tr>
                     <tr>
                       <th>WorkExperience</th>
                       <td>{{$interview['WorkExperience']}}</td>
                     </tr>
                     <tr>
                       <th>SkillsAndKnowledge</th>
                       <td>{{$interview['SkillsAndKnowledge']}}</td>
                     </tr>
                     <tr>
                       <th>Attitude</th>
                       <td>{{$interview['Attiutde']}}</td>
                     </tr>
                     <tr>
                       <th>Education</th>
                       <td>{{$interview['Education']}}</td>
                     </tr>
                     <tr>
                       <th>Teachability</th>
                       <td>{{$interview['Teachability']}}</td>
                     </tr>
                     <tr>
                       <th>Initiative</th>
                       <td>{{$interview['Initiative']}}</td>
                     </tr>
                     <tr>
                       <th>TeamSpirit</th>
                       <td>{{$interview['TeamSpirit']}}</td>
                     </tr>
                     <tr>
                       <th>StrengthAndWeakness</th>
                       <td>{{$interview['StrengthAndWeakness']}}</td>
                     </tr>
                     <tr>
                       <th>CareerGoal</th>
                       <td>{{$interview['CareerGoal']}}</td>
                     </tr>
                     <tr>
                       <th>SalaryExpectation</th>
                       <td>{{$interview['SalaryExpectation']}}</td>
		                 </tr>
                    
                    @endforeach
		        </table>
        </div>
	</div>
</div>
@endsection
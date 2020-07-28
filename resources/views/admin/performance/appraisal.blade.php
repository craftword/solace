@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.manpower.index') }}">Talent Management</a></li>  
    <li class="breadcrumb-item active" aria-current="page">View Appraisal</li>
  </ol>
</nav>

<div class="panel panel-default">
    <div class="panel-heading">
        Staff Summary
    </div>
	
    <div class="row">
        <div class="col-md-offset-1 col-xs-10">
		        <table class="table table-bordered">
		            <tr>
                       <th>Appraisee</>
                       <th>Overall Rating</th>
                       <th>Recommendation</th>
                       <th>Action Plan</th>
                       <th>Appraiser</th>
                       <th>Date</th>
		            </tr>
                    @foreach($appraises as $row)
                    <tr>
                        <td>{{$row['Appraisee']}}</td>
                        <td>{{$row['OverallRating']}}</td>
                        <td>{{$row['Recommendation']}}</td>
                        <td>{{$row['ActionPlan']}}</td>
                        <td>{{$row['AppraiserName']}}</td>
                        <td>{{$row['created_at']}}</td>
                    </tr>
                    @endforeach
		        </table>
        </div>
	</div>
</div>
@endsection
@extends('layouts.app')

@section('content')
	
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.talent.index') }}">Talent Management</a></li>    
    <li class="breadcrumb-item active" aria-current="page">Reports</li>
  </ol>
</nav>
    <h3 class="page-title">Talent Management</h3>
    <p>
    <a href="{{url('admin/interview/index') }}" class="btn btn-info">Interview Report</a>   
    <a href="{{url('admin/performance/appraisal') }}" class="btn btn-warning">Appraisal Report</a>     
    <a href="{{route('admin.manpower.index') }}" class="btn btn-primary">Training Plan</a> 
    <a href="{{route('admin.development.store') }}" class="btn btn-danger">Promotion Report</a> 
    <a href="{{url('admin/performance/appraisal') }}" class="btn btn-info">Salary Cycle Report</a>     
    </p>
    
</div>
@endsection  


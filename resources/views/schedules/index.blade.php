@extends('layouts.app')

@section('content')
<div class="row">
	<div>
		<a class="btn btn-success" href="{{ route('schedules.create') }}" style="float:right;">
			<i class="fa fa-plus"></i>New Schedule
		</a>
		<h2>Schedules</h2>

		{!! Form::open(['method'=>'GET','url'=>'schedules','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
		<div class="input-group custom-search-form">
		    <input type="date" class="form-control" value="{{ $start_s }}" name="start_s" placeholder="Search...">
		    <span class="input-group-btn">
		        <button class="btn btn-default-sm" type="submit">
		            <i class="fa fa-search"></i>
		        </button>
		    </span>
		</div>
		{!! Form::close() !!}
		@if (count($schedules) == 0)
		  <div class="" style="font-size: 30px;">
		    There is no Schedules
		  </div>
		@else
			<div class="card">
			  <table class="table table-stripped table-hover table-responsive" id="sample-table">
			    <thead>
			    	<tr>
				      <th>Patient</th>
				      <th>Doctor</th>
				      <th>Start</th>
				      <th>End</th>
				    </tr>
			    </thead>
			    <tbody>
				  	@foreach ($schedules as $schedule)
				      <tr>
				        <td>{{ $schedule->patient->name }}</td>
				        <td>{{ $schedule->doctor->name }}</td>
				        <td>{{ date('m/d/Y H:i', strtotime($schedule->start_at)) }}</td>
				        <td>{{ date('m/d/Y H:i', strtotime($schedule->end_at)) }}</td>
				        <td>
				          <form action="{{ route('schedules.destroy',$schedule->id) }}" method="POST">

				  	        <a class="btn btn-outline-primary" href="{{ route('schedules.edit',$schedule->id) }}"><i class="fa fa-edit"></i></a>

				  	        @csrf
				  	        @method('DELETE')

				  	        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>

				          </form>
				        </td>
				      </tr>
				    @endforeach
				  </tbody>
			  </table>
			 </div>
		@endif
	</div>
</div>
@endsection
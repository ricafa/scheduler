@extends('layouts.app')

@section('content')
<div class="row">
	<div>
		<a class="btn btn-success" href="{{ route('schedules.create') }}" style="float:right;">
			<i class="fa fa-plus"></i>New Schedule
		</a>
		<h2>Schedules</h2>
		@if (count($schedules) == 0)
		  <div class="" style="font-size: 30px;">
		    There is no Schedules
		  </div>
		@else
			<div class="card">
			  <table class="table table-stripped table-hover table-responsive">
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
				        <td>{{ $schedule->patient_id }}</td>
				        <td>{{ $schedule->doctor_id }}</td>
				        <td>{{ $schedule->start_at }}</td>
				        <td>{{ $schedule->end_at }}</td>
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
@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12">
		<h2>New Schedule</h2>
		<div class="card">
			<div class=" col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
				{{ Form::open(array('url' => 'schedules')) }}
				<!-- <form method="post" action="{{url('schedules')}}" enctype="multipart/form-data"> -->
				  @csrf
				    <div class="col-md-12"></div>
				    <div class="form-group col-md-12">
				      <label for="patient_id">Patient:</label>
				      {{ Form::select('patient_id', $patients, ['class' => 'form-control']) }} 
				    </div>

				    <div class="col-md-12"></div>
				    <div class="form-group col-md-12">
				      <label for="doctor_id">Doctor:</label>
				      {{ Form::select('doctor_id', $doctors, ['class' => 'form-control']) }} 
				    </div>

				    <div class="col-md-12"></div>
				      <div class="form-group col-md-12">
				        <label for="start_at">Start at:</label>
				        {!! Form::input('datetime-local', 'start_at', date('Y-m-d\TH:i'), ['class' => 'form-control']) !!}
				      </div>
				    <div class="col-md-12"></div>
				      <div class="form-group col-md-12">
				        <label for="end_at">End at:</label>
				        {!! Form::input('datetime-local', 'end_at', date('Y-m-d\TH:i'), ['class' => 'form-control']) !!}
				      </div>

				    <div class="row">
					    <div class="col-md-4"></div>
					    <div class="form-group col-md-4">
					      <button type="submit" class="btn btn-success">Submit</button>
					  	</div>
					  </div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endsection
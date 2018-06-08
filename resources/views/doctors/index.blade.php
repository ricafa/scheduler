@extends('layouts.app')

@section('content')
<div class="row">
	<div>
		<a class="btn btn-success" href="{{ route('doctors.create') }}" style="float:right;"><i class="fa fa-plus"></i>New Doctor</a>
		<h2>Doctors</h2>
		@if (count($doctors) == 0)
		  <div class="" style="font-size: 30px;">
		    There is no Doctors
		  </div>
		@else
			<div class="card">
			  <table class="table table-stripped table-hover table-responsive">
			    <thead>
			    	<tr>
				      <th>Name</th>
				      <th>Document</th>
				     </tr>
			    </thead>
			    <tbody>
				  	@foreach ($doctors as $doctor)
				      <tr>
				        <td>{{ $doctor->name }}</td>
				        <td>{{ $doctor->document }}</td>
				        <td>
				          <form action="{{ route('doctors.destroy',$doctor->id) }}" method="POST">

				  	        <a class="btn btn-outline-primary" href="{{ route('doctors.edit',$doctor->id) }}"><i class="fa fa-edit"></i></a>

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
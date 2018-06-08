@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12">
		<h2>New Doctor</h2>
		<div class="card">
			<div class=" col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
				<form method="post" action="{{url('doctors')}}" enctype="multipart/form-data">
				  @csrf
				    <div class="col-md-12"></div>
				    <div class="form-group col-md-12">
				      <label for="Name">Name:</label>
				      <input type="text" class="form-control" name="name">
				    </div>
				    <div class="col-md-12"></div>
				      <div class="form-group col-md-12">
				        <label for="document">Document:</label>
				        <input type="text" class="form-control" name="document" id="document">
				      </div>
				    <div class="row">
					    <div class="col-md-4"></div>
					    <div class="form-group col-md-4">
					      <button type="submit" class="btn btn-success">Submit</button>
					  	</div>
					  </div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
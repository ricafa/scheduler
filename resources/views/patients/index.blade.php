@extends('layouts.app')

@section('content')
<h2>Patients</h2>
<div class="row">
  <a class="btn btn-info" href="{{ route('patients.create') }}">New Patient</a>
</div>
@if (count($patients) == 0)
  <div class="" style="font-size: 30px;">
    There is no Patients
  </div>
@else
  <table class="table table-stripped table-hover table-responsive">
    <thead>
      <th>Name</th>
      <th>CPF</th>
    </thead>
  	@foreach ($patients as $patient)
      <tr>
        <td></td>
        <td>{{ $patient->name }}</td>
        <td>{{ $patient->cpf }}</td>
        <td>
          <form action="{{ route('patients.destroy',$patient->id) }}" method="POST">

  	        <a class="btn btn-default" href="{{ route('patients.show',$patient->id) }}"><span class="glyphicon glyphicon-plus"></span></a>

  	        <a class="btn btn-deafult" href="{{ route('patients.edit',$patient->id) }}">Edit</a>

  	        @csrf
  	        @method('DELETE')

  	        <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
@endif

@endsection
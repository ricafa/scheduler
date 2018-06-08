@extends('layouts.app')

@section('content')
<div class="row">
  <div>
  <a class="btn btn-success" href="{{ route('patients.create') }}" style="float:right;">
    <i class="fa fa-plus"></i>New Patient
  </a>
  <h2>Patients</h2>
  @if (count($patients) == 0)
    <div class="" style="font-size: 30px;">
      There is no Patients
    </div>
  @else
  <div class="card">
    <table class="table table-stripped table-hover table-responsive" id="sample-table">
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

              <a class="btn btn-outline-primary" href="{{ route('patients.edit',$patient->id) }}"><i class="fa fa-edit"></i></a>

              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  @endif

@endsection
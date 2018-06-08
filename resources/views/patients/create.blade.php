<h2>New Patient</h2><br/>
<form method="post" action="{{url('patients')}}" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      <label for="Name">Name:</label>
      <input type="text" class="form-control" name="name">
    </div>
  </div>
  <div class="row">
    <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="cpf">CPF:</label>
        <input type="text" class="form-control" name="cpf" id="cpf">
      </div>
    </div>
 
  <div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4" style="margin-top:60px">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
</form>
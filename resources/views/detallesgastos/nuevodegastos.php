@extends('layouts.app')
@section('content')
<div class="col-lg-4">
    
</div>

<div class="col-lg-4">

        <h3>Registro detalles de gastos</h3>
    
    <form>
  <div class="form-group">
    <label>tipo de gasto</label>
    <input type="text" required="" class="form-control" placeholder="nombre del gasto ">
  </div>
  <div class="form-group">
    <label>Monto</label>
    <input type="text" required="" class="form-control" placeholder="monto en formato0 0,00">
  </div>
 <div class="form-group">
    <label>Fecha</label>
    <input type="text" required="" class="form-control" placeholder="monto en formato0 0,00">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>

</div>
<div class="col-lg-4">
    
</div>

@endsection
@extends('layouts.template')
@section('content')

<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Nuevo servicio</div>
                <div class="divider"></div>
                <br>

                <form action="{{url('/createservicio')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nombre del servicio</label>
                        <input required="" type="text" class="form-control" name="nombre" >
                    </div>
                    <div class="form-group">
                        <label>Descripcion del servicio</label>
                        <textarea required="" class="materialize-textarea"  name="descripcion"></textarea>
                    </div>



  <button type="submit" class="btn indigo darken-4">Guardar</button>
                </form>

                
            </div>
            </div>
         
        </div>
    </div>
</div>

@endsection
@extends('layouts.template')
@section('content')

<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Editar gasto</div>
                <div class="divider"></div>
                <br>

                <form action="{{url('/updategasto')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group">
                        <label>Nombre del gasto</label>
                        <input type="text" required="" class="form-control" name="nombre"  value="{{$gasto->nombreg}}" placeholder="nombre del gasto ">
                    </div>
                    <div class="form-group">
                        <label>descripción</label>
                        <input type="text" required="" class="form-control" name="descripcion"  value="{{$gasto->descripcion}}" placeholder="descripción ">
                    </div>
                    <div class="form-group">
                        <label>fecha</label>
                        <input type="text" required=""  name="fecha"  value="{{$gasto->fecha}}" class="datepicker">
                    </div>
                    <div class="form-group">
                        <label>Monto</label>
                        <input type="text" required="" class="form-control"  value="{{$gasto->monto}}" name="monto" placeholder="monto ">
                    </div>


                    <button type="submit" class="btn indigo darken-4">Guardar</button>
                </form>
            </div>   
        </div>
    </div>
</div>

@endsection
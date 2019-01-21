@extends('layouts.template')
@section('content')

<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Nuevo gastos</div>
                <div class="divider"></div>
                <br>

                <form action="{{url('/guardargasto')}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Nombre del Gasto</label>
                        <select name="nombre" class="form-control">
                            <option>Selecciona el gasto</option>
                            @if(count($serv) > 0)
                            @foreach($serv as $key)
                            <option value="{{$key->nombre}}">{{$key->nombre}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
            
                    <div class="form-group">
                        <label>descripción</label>
                        <input type="text" required="" class="form-control" name="descripcion" placeholder="descripción ">
                    </div>
                    <div class="form-group">
                        <label>fecha</label>
                        <input type="text" required=""  name="fecha" class="datepicker">
                    </div>
                    <div class="form-group">
                        <label>Monto</label>
                        <input type="text" required="" class="form-control" name="monto" placeholder="monto ">
                    </div>


                    <button type="submit" class="btn indigo darken-4">Guardar</button>
                </form>
            </div>   
        </div>
    </div>
</div>

@endsection
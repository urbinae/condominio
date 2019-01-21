@extends('layouts.template')
@section('content')

<div class="row">
    <div class="col l12">


        <div class="card">
            <div class="card-content">
                <div class="card-title">Nuevo Propietario</div>
                <div class="divider"></div>
                <br>

                <form action="{{url('/guardarpersona')}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label>Cédula</label>
                        <input type="text" title="Ingrese la cedula" class="form-control" name="cedula" required>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input  type="text" title="Se necesita un nombre y apellido" class="form-control" name="name"required >
                    </div> 
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" name="telefono" >
                    </div>
                  <!--  <div class="form-group">
                        <label>Apartamento</label>
                        <input type="text" class="form-control" name="apartamento" required >
                    </div>-->
                    <div class="form-group">

                        {{ csrf_field() }}
                        <label>Apartamento</label>
                        <select name="apartamento" class="form-control">
                            <option>Selecciona el apartamento</option>
                            @if(count($aptos) > 0)
                            @foreach($aptos as $key)
                            <option value="{{$key->id}}">{{$key->piso_apto}} - {{$key->num_apto}} </option>
                            @endforeach
                            @endif              
                        </select>
                    </div>
                    <a href="{{url('/persona')}}"  class="btn-flat grey-text">Cancelar</a>
                    <button type="submit" class="btn blue right">Guardar</button>
                    
                </form>
            </div>
        </div>



    </div>
</div>


@endsection
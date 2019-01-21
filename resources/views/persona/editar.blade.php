@extends('layouts.template')
@section('content')

<div class="row">
    <div class="col l12">


        <div class="card">
            <div class="card-content">
                <div class="card-title">Editar Propietario</div>
                <div class="divider"></div>
                <br>

                <form action="{{url('/updatepersona')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$id}}">

                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="text" disabled="" class="form-control" name="email" value="{{$user->email}}">
                    </div>

                    <div class="form-group">
                        <label>Cédula</label>
                        <input type="text" class="form-control" name="cedula" value="{{$user->cedula}}" >
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}" >
                    </div> 
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" name="telefono" value="{{$user->telefono}}" >
                    </div>
                
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
                    <button type="submit" class="btn blue right">Actualizar</button>

                </form>
            </div>
        </div>


        @endsection
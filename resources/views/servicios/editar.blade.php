@extends('layouts.template')
@section('content')


<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Editar servicio</div>
                <div class="divider"></div>
                <br>

                <form action="{{url('/updateservicio')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group">
                        <label>Nombre del servicio</label>
                        <input type="text" class="form-control" value="{{$servicio->nombre}}" name="nombre" >
                    </div>
                    <div class="form-group">
                        <label>Descripcion del servicio</label>
                        <textarea class="materialize-textarea" name="descripcion">{{$servicio->descripcion}}</textarea>
                    </div>


                </form>
            </div>
            <div class="card-action">

                <a class="btn-flat grey-text" href="{{url('/servicios')}}">Cancelar</a>
                <button type="submit" class="btn blue right">Guardar</button>

            </div>
        </div>
    </div>
</div>
@endsection
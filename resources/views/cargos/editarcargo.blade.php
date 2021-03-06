@extends('layouts.template')
@section('content')



<div class="row">
    <div class="col l12 ">
        <div class="card">
            <form action="{{url('/updatecargo')}}" method="post">
                <div class="card-content">
                    <div class="card-title">Editar cargo</div>
                    <div class="divider"></div>
                    <br>


                    <div class="form-group">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$id}}">
                        <label>Nombre del cargo</label>
                        <input type="text" class="form-control" value="{{$cargo->descripcionc   }}" name="descripcionc" placeholder="Nombre del cargo">
                    </div>
                    <div class="form-group">
                        <label>Estatus</label>

                        <select name="statusc" class="form-control dissable">
                            <option value="true">Activo</option>
                        </select>
                    </div>




                </div>
                <div class="card-action">
                    <a class="btn-flat grey-text" href="{{url('cargos')}}">Cancelar</a>
                    <button type="submit" class="btn waves-effect waves-light blue right">Guardar</button>
                </div>
            </form>
        </div>

    </div>
</div>


@endsection
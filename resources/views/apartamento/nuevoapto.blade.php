@extends('layouts.template')
@section('content')

<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Registro de apartamentos</div>
                <div class="divider"></div>
                <br>

                <form action="{{url('/createapto')}}" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Número de piso</label>
                        <input type="text" required="" name="npiso" class="form-control" >
                        <em style="color: #b9b9b9; font-size: 12px">Ingrese en formato numérico el número de piso</em>
                    </div>
                    <div class="form-group">
                        <label>Número de apartamento</label>
                        <select name="napto" class="form-control">
                            <option>Selecciona el numero de apartamento</option>
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>  
                            <option value="04">4</option>           
                        </select>
                    </div>


                    <a href="" class="btn-flat grey-text">Cancelar</a>
                    <button type="submit" class="btn  blue right">Guardar</button>
                </form>

            </div>

        </div>
    </div>
</div>


@endsection
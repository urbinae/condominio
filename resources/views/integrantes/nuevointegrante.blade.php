@extends('layouts.template')
@section('content')


<div class="row">
    <div class="col l12 ">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Representante del condominio</div>
                <div class="divider"></div>
                <br>
                <form action="{{url('/crearintegrante')}}" method="post">
                    <div class="form-group">

                        {{ csrf_field() }}
                        <label>Cargo</label>
                        <select name="cargo" class="form-control">
                            <option>Selecciona el cargo</option>
                            @if(count($cargo) > 0)
                            @foreach($cargo as $key)
                            <option value="{{$key->id}}">{{$key->descripcionc}}</option>
                            @endforeach
                            @endif              
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Propietarios</label>
                        <select name="user" class="form-control">
                            <option>Selecciona al Protietario</option>
                            @if(count($users) > 0)
                            @foreach($users as $key)
                            <option value="{{$key->id}}">{{$key->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>fecha inicio</label>
                        <input type="text" required=""  name="finicio" class="datepicker">
                    </div>
                    <div class="form-group">
                        <label>fecha fin</label>
                        <input type="text"  required="" name="ffin" class="datepicker">

                    </div>

                    <button type="submit" class="btn indigo darken-4">Guardar</button>
                </form>
            </div>
        </div>




    </div>
</div>
@endsection
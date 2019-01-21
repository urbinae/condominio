@extends('layouts.template')
@section('content')

<div class="row" style="margin-top: 10px; margin-bottom: 5px">
    <div class="col l12">
        <a href="{{url('nuevointegrante')}}" class="btn waves-light waves-effect blue">Nuevo integrante</a>
    </div>
</div>

<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Integrantes</div>
                <div class="divider"></div>
                <br>

                <table class="table">
                    <thead>
                        <tr>
                            <th class="success"><b>Cargo</b></th>
                            <th class="success"><b>Nombre</b></th>
                            <th class="success"><b>fecha inicio</b></th>
                            <th class="success"><b>fecha fin</b></th>                            

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($inte) > 0)
                        @foreach($inte as $key)
                        <tr>

                            <?php $user = \App\User::find($key->id_user); ?>
                            <?php $cargo = \App\Cargo::find($key->idcargo); ?>
                            <td>{{$user->name}}</td>
                            <td>{{$cargo->descripcionc}} </td>
                            <td>{{$key->fecha_inicio}}</td>
                            <td>{{$key->fecha_fin}}</td>                             
                        </tr>

                        @endforeach          
                        @endif

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

@endsection
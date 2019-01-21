@extends('layouts.template')
@section('content')

<div class="row" style="margin-top: 10px; margin-bottom: 5px">
    <div class="col l12">
        <a href="{{url('nuevocargo')}}" class="btn waves-light waves-effect blue">Nuevo cargo</a>
    </div>
</div>

<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Cargos</div>
                <div class="divider"></div>
                <br>                
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="success"><b>Nombre</b></th>
                                <th class="success"><b>estatus</b></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @if(count($cargo) > 0)
                            @foreach($cargo as $key)

                            <tr>
                                <td>{{$key->descripcionc}}</td>
                                <td>@if($key->Activo) {{"Activo"}} @else {{"Inactivo"}} @endif</td>
                                <td width="200">
                                    <a href="{{url('/editarcargo')."/".$key->id}}" class="btn-flat blue-text"><i class="mdi-editor-border-color"></i></a>                                                  
                                    <a href="{{url('/eliminarcargo')."/".$key->id}}" class="btn-flat grey-text"><i class="mdi-content-clear"></i></a>  
                                </td>
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
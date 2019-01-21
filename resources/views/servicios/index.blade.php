
@extends('layouts.template')
@section('content')

<div class="row" style="margin-top: 10px; margin-bottom: 5px">
    <div class="col l12">
        <a href="{{url('nuevoservicio')}}" class="btn waves-light waves-effect blue">Nuevo servicio</a>
    </div>
</div>
<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Servicios</div>
                <div class="divider"></div>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-success">
                            <th >Servicio</th>
                            <th >Descripción</th>            
                            <th></th>            
                        </tr>           
                    </thead>
                    <tbody>
                        @if(count($servicios) > 0)
                        @foreach($servicios as $key)    

                        <tr>            
                            <td>{{$key->nombre}}</td>
                            <td>{{$key->descripcion}}</td>
                            <td width="200">
                                <a href="{{url('/editarservicio')."/".$key->id}}" class="btn-flat blue-text"><i class="mdi-editor-border-color"></i></a>                    
                                <a href="{{url('/removerservicio')."/".$key->id}}" class="btn-flat grey-text"><i class="mdi-content-clear"></i></a>                    
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
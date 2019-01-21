@extends('layouts.template')
@section('content')
<div class="row" style="margin-top: 20px">
    <div class="col l12">

        <div class="row">
            <div class="col l12 right-align">
                <a href="{{url('reporte_cuentaspagar')}}" class="btn waves-light waves-effect blue right" style="margin-left: 10px"><i class="material-icons">print</i></a>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <div class="card-title">Cuentas por Cobrar</div>
                <div class="divider"></div>
                <br>

                <table class="table bordered">
                    <thead>
                        <tr class="bg-success">
                            <th >Mes</th>
                            <th >Descripcion</th>
                            <th >Monto</th>
                            <th >Iva</th>             
                            <th> Monto Total</th>
                            <th> Estatus</th>                             
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $functions = new \App\Http\Controllers\Controller();?>
                        @if(count($gastos) > 0)
                        @foreach($gastos as $key)
                        <tr>
                            <td>{{$functions->mes($key->mes)}}</td>                            
                            <td>{{$key->descripcion_pagar}}</td>
                            <td>{{$key->montop}}</td>
                            <td>{{$key->iva}}</td>
                            <td>{{$key->monto}}</td>
                            <td>{{($key->status)?'Activo':'inactivo'}}</td>
                            <td>
                                <a href="{{url('pagar')}}" class="ben-flat blue-text"><i class="material-icons">check</i></a>
                                <a href="{{url('cancelarpago')."/".$key->mes}}" class="ben-flat grey-text"><i class="material-icons">cancel</i></a>
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